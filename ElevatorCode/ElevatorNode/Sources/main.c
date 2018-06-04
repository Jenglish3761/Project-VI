#include <hidef.h>            /* common defines and macros */
#include "derivative.h"       /* derivative-specific definitions */
#include "CAN.h"
#include <stdio.h>
#include <stdlib.h>
#include "delay.h"

#define INPUTS             0b00000000
#define OUTPUTS            0b11111111
//Floor indicator lights
#define FIRST_INDICATOR    0b00000010
#define SECOND_INDICATOR   0b00000100
#define THIRD_INDICATOR    0b00001000
//Setting lights
#define CALL_LIGHT1_MASK   0b00000001
#define CALL_LIGHT2_MASK   0b00010000
#define CALL_LIGHT3_MASK   0b00100000
#define CALL_LIGHTS        0b00110001
#define CLOSED_LIGHT_MASK  0b01000000
#define OPEN_LIGHT_MASK    0b10000000
#define BUTTON_LIGHTS      0b11110001 
//Button values
#define CALL_FLOOR_1       0b00011110
#define CALL_FLOOR_2       0b00011101
#define CALL_FLOOR_3       0b00011011
#define CALL_CLOSE         0b00010111
#define CALL_OPEN          0b00001111
//Masking
#define FLOOR_BUTTON_MASK  0b00011111
#define NO_PRESSED         0b
//Floor data
#define FLOOR1             0x05
#define FLOOR2             0x06
#define FLOOR3             0x07
#define CLOSE              0x08
#define OPEN               0x09
#define THISFLOOR          0x7


//#define NOT (x)&0b1111111
void elevatorInit(void);
unsigned int updateIndicator(void);
void updateDoor(void);


unsigned char errorflag = CAN_NO_ERROR;
void main(void) {
  
  int isPushed = 0;
  
  unsigned int currentFloor = THISFLOOR;  //  Initialize current to this floor so call indicator is cleared.
  unsigned int TXBUFF = THISFLOOR;        //  Initialize transmit buffer to this floor.
  unsigned int calledFloor = 0;
  unsigned int isOpen = 0;
    
  //  Initialize elevator.
  elevatorInit();
  PORTB |= OPEN_LIGHT_MASK;
  //  After initialization enter main loop.
  for(;;){
  
  //PORTB = 0b11000000;
  
  //  A new CAN message has been recieved.
  if(CANRFLG == 0x00){
    //  Update floor number indicators.
    currentFloor = updateIndicator();
    //updateDoors();
    CANRFLG &= 0x01;  // Reset can flag because message has been dealt with.
  }
  
  
  //  Check for call button press.
  //  If pressed turn on call light and send call to supervisor.
  if(PORTA != FLOOR_BUTTON_MASK){
    
     switch (PORTA) {
      case CALL_FLOOR_1 :    //If FLOOR_X is called    
        if(isPushed == 0) {  //  Check if button is still pushed.
          calledFloor = FLOOR1;      //  Tell which floor to turn off indicator at 
          PORTB |= CALL_LIGHT1_MASK;  //  Turn on call light without affecting indicators.
          TXBUFF = FLOOR1;           //  Tell where to send
          errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF); // Send
          isPushed = 1;   //    Only send per 1 push
        }
      break;
      
      case CALL_FLOOR_2 : 
        if(isPushed == 0) {
          calledFloor = FLOOR2;
          PORTB |= CALL_LIGHT2_MASK;  
          TXBUFF = FLOOR2;
          errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF);
          isPushed = 1; 
        }
      break;
      
      case CALL_FLOOR_3 :
        if(isPushed == 0){   
          calledFloor = FLOOR3;
          PORTB |= CALL_LIGHT3_MASK;  
          TXBUFF = FLOOR3;
          errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF);
          isPushed = 1; 
        }
      break;
      
      
      case CALL_OPEN :  //Open door (disable elevator)    
        if(isPushed == 0){   
          //isOpen = 1;
          PORTB &= ~(CLOSED_LIGHT_MASK);
          PORTB |= OPEN_LIGHT_MASK;  
          TXBUFF = OPEN;
          errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF);
          isPushed = 1; 
        }
      break;
      
      case CALL_CLOSE :  //Close door (enable elevator)
        if(isPushed == 0){   
          isOpen = 1;
          PORTB &= ~(OPEN_LIGHT_MASK);
          PORTB |= CLOSED_LIGHT_MASK;  
          TXBUFF = CLOSE;
          errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF);
          isPushed = 1; 
        }
      break;
      
      
    }
  } else{ //Reset buttons and lights
      
    if(calledFloor == currentFloor) {//  Keep call indicator on until elevator reaches this floor.
      calledFloor = 0;           //   Reset called Floor
      PORTB &= ~(CALL_LIGHTS);  //  Turn off indicator.
      
      
      if(isOpen == 0){
        PORTB &= ~(CLOSED_LIGHT_MASK);
        PORTB |= OPEN_LIGHT_MASK; 
      }
       
    } 
    
    isPushed = 0; //  Reset button push
  }
    
   
  }
  
  //  Loop forever.
}


//  Initialize inputs, outputs, CAN controller, synchronization with CAN bus, and enable interrupts.
void elevatorInit(void)  {
  unsigned int TXBUFF = OPEN;        //  Initialize transmit buffer to this floor.

  DDRA = INPUTS;                  //  Set DDRA as inputs (call buttons).
  DDRB = OUTPUTS;                 //  Set DDRB as outputs (indicator lights).
  DDRT = OUTPUTS;
  CANInit();                      //  Initialize CAN controller.
  while (!(CANCTL0 & CAN_SYNC));  //  Wait for MSCAN to synchronize with the CAN bus 
  CANRFLG = 0xC3;                 //  Enable CAN Rx interrupts (interrupt for new message recieved).
  CANRIER = 0x01;                 //  Clear CAN recieved flag.
  EnableInterrupts;
  errorflag = CANTx(ST_ID_200, 0x00,sizeof(TXBUFF)-1, TXBUFF);
  return;
}

//  Update floor indicator lights.
unsigned int updateIndicator(void)  {
  unsigned int current = rxdata[0];
  //  Clear floor indicators without affectign call light.
  PORTB &= BUTTON_LIGHTS;

  
  switch(current) {
    case FLOOR1 : //  Elevator on floor 1.
      PORTB |= FIRST_INDICATOR;
        break;
    case FLOOR2 : //  Elevator on floor 2. 
      PORTB |= SECOND_INDICATOR;
        break;
    case FLOOR3 : //  Elevator on floor 3.
      PORTB |= THIRD_INDICATOR;
        break;
  }
  return current;
}  



void updateDorr(void) {
  unsigned int current = rxdata[0];
 
  switch(current) {
    case OPEN : 
      PORTB &= ~(CLOSED_LIGHT_MASK);
      PORTB |= OPEN_LIGHT_MASK;
    break;
    case CLOSE : 
      PORTB &= ~(OPEN_LIGHT_MASK);
      PORTB |= CLOSED_LIGHT_MASK;  
    break;
  }
  
}
















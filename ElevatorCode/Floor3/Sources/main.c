#include <hidef.h>            /* common defines and macros */
#include "derivative.h"       /* derivative-specific definitions */
#include "CAN.h"
#include <stdio.h>
#include <stdlib.h>
#include "delay.h"

#define INPUTS            0b00000000
#define OUTPUTS           0b11111111
#define FIRST_INDICATOR   0b00000010
#define SECOND_INDICATOR  0b00000100
#define THIRD_INDICATOR   0b00001000
#define CALL_LIGHT_MASK   0b00000001
#define FLOOR1            0x05
#define FLOOR2            0x06
#define FLOOR3            0x07
#define TXBUFF            0x7
#define THISFLOOR         0x7

void elevatorInit(void);
unsigned int updateIndicator(void);



void main(void) {
  
  int isPushed = 0;
  unsigned char errorflag = CAN_NO_ERROR;
  unsigned int currentFloor = THISFLOOR;  //  Initialize current to this floor so call indicator is cleared.
  
    
  //  Initialize elevator.
  elevatorInit();
  
  //  After initialization enter main loop.
  for(;;){
  
  //  A new CAN message has been recieved.
  if(CANRFLG == 0x00){
    //  Update floor number indicators.
    currentFloor = updateIndicator();
    CANRFLG &= 0x01;  // Reset can flag because message has been dealt with.
  }
  
  //  Check for call button press.
  //  If pressed turn on call light and send call to supervisor.
  if((PORTA == 0x00) && (currentFloor != THISFLOOR)){
    PORTB |= CALL_LIGHT_MASK;  //  Turn on call light without affecting indicators.
    
      //  Check if button is still pushed.
      if(isPushed == 0){

        //  Send call to supervisor.
        errorflag = CANTx(ST_ID_202, 0x00,sizeof(TXBUFF)-1, TXBUFF);
        isPushed = 1;   
      }

    }else{
    
    //  Keep call indicator on until elevator reaches this floor.
    if(currentFloor == THISFLOOR) {
      PORTB &= !(CALL_LIGHT_MASK);  //  Turn off indicator.
    }
    
    isPushed = 0;
   }
  }
  
  //  Loop forever.
}


//  Initialize inputs, outputs, CAN controller, synchronization with CAN bus, and enable interrupts.
void elevatorInit(void)  {
  DDRA = INPUTS;                  //  Set DDRA as inputs (call buttons).
  DDRB = OUTPUTS;                 //  Set DDRB as outputs (indicator lights).
  CANInit();                      //  Initialize CAN controller.
  while (!(CANCTL0 & CAN_SYNC));  //  Wait for MSCAN to synchronize with the CAN bus 
  CANRFLG = 0xC3;                 //  Enable CAN Rx interrupts (interrupt for new message recieved).
  CANRIER = 0x01;                 //  Clear CAN recieved flag.
  EnableInterrupts;
  return;
}

//  Update floor indicator lights.
unsigned int updateIndicator(void)  {
  unsigned int current = rxdata[0];
  //  Clear floor indicators without affectign call light.
  PORTB &= CALL_LIGHT_MASK;
  
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
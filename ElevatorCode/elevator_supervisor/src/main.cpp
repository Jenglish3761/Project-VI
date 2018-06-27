/*
	FILE:			main.cpp (for elevator project)
	AUTHOR:		Alex Bradley & Michael Wright
	DATE:			June 26, 2018
	PURPOSE:	To provide logic and control for elevator.
*/

//	Libraries:
#include "../include/pcanFunctions.h"
#include "../include/databaseFunctions.h"
#include "../include/mainFunctions.h"
#include <stdio.h>
#include <stdlib.h>
#include <stdlib.h>
#include <errno.h>
#include <unistd.h>
#include <signal.h>
#include <string.h>
#include <fcntl.h>		// O_RDWR
#include <unistd.h>
#include <ctype.h>
#include <libpcan.h>	// PCAN library
#include <pcan.h>
#include "queue.h"
#include "node.h"

//	Constants:
#define MOTOR_ID	0x101
#define FLOOR_1		0x5
#define FLOOR_2		0x6
#define FLOOR_3		0x7

//	Prototypes:
void get_CAN_message(void);

//	Forever main:
int main()	{

	unsigned char currentFloor;

	//	Create a pointer to node and initialize the queue.
	Node *pNode;
	initialQueue();
	int result = 0;

	//	Set up can.
	TPCANMsg Rxmsg;
	int ID = 0x100;	//	Set transmit ID to 100 hex.
	int enable = 0;

	//	Send elevator to floor one upon start.
	pcanTx(ID, FLOOR_1);
	currentFloor = FLOOR_1;

	//	Loop forever.
	for (;;)	{

		get_CAN_message();

		//	Check if queue is empty. If not empty process message.
		//	isQueueEmpty() returns non zero if queue is empty.
		if(isQueueEmpty() == 0)	{

			//	Exclude if senderId == currentFloor (does not need to move if
			//	already on current floor).
			if(pNode.senderId < currentFloor)	{	//	Down request has been recieved.
				//	Move elevator to requested floor.
				pcanTx(ID, pNode.message);
				// Wait for elevator to reach requested floor.
				do {
					get_CAN_message();
				} while(Rxmsg.DATA[0] != pNode.messages);

			} else if (pNode.senderId > currentFloor)	{	//	Up request has been recieved.
				//	Move elevator to requested floor.
				pcanTx(ID, pNode.message);
				// Wait for elevator to reach requested floor.
				do {
					get_CAN_message();
				} while(Rxmsg.DATA[0] != pNode.messages);

			}

		} else {
			// No requests, elevator idle.
			printf("\nElevator idle.");
			switch (currentFloor)	{
				case FLOOR_1	:
				 	printf("\nCurrently on floor 1.\n");
				 	break;
				case FLOOR_2	:
					printf("\nCurrently on floor 2.\n");
					break;
				case FLOOR_3	:
					printf("\nCurrently on floor 3.\n");
			}
		}
	}
}

//	Functions:

//	Reads CAN bus, adds messages to queue and updates current floor.
void get_CAN_message(void)	{
	//	Get CAN bus message.
	Rxmsg = pcanRx(1);

	//	Check if message is floor update.
	if(Rxmsg.ID != MOTOR_ID)	{
		// 	Add new message to queue.
		pNode = (link)malloc(sizeof(node));
		pNode.senderId = Rxmsg.ID
		pNode.recieverId = 0x100;
		pNode.message = Rxmsg.DATA[0];
		addToQueue(pNode);
	} else {
		// Message is current floor update.
		// Do not add to queue, update currentFloor.
		currentFloor = Rxmsg.DATA[0];
	}
}

//	Old Code:
/*
			printf("Enabled = 1, Disabled = 0  :  %d", enable);
			if ((int)pNode.senderId != MOTOR_ID)	{
				if(enable == 1)	{
					switch (pNode.message)	{
						//	Floor 1.
						case 0x5 :
							pcanTx(ID, pNode.message);
							enable = 0;
						break;

						//	Floor 2.
						case 0x6 :
							pcanTx(ID, pNode.message);
							enable = 0;
						break;

						//	Floor 3.
						case 0x7 :
							p	canTx(ID, pNode.message);
							enable = 0;
						break;
					}


					//	Open and close elevator
					if(pNode.message == 0x8)	{
						enable = 1;
					} else if (pNode.message == 0x9)	{
		 				enable = 0;
					}
				}
			}
*/

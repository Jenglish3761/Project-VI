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

#define MOTOR_ID 0x101


int main()	{

	TPCANMsg Rxmsg;
	int ID = 0x100; // Set transmit ID to 100 hex.
	int enable = 0;
	for (;;)	{
		Rxmsg = pcanRx(1);
		printf("Enabled = 1, Disabled = 0  :  %d", enable);
		if ((int)Rxmsg.ID != MOTOR_ID)
		{
			if(enable == 1){
			switch (Rxmsg.DATA[0])	{
				//	Floor 1.
				case 0x5 :
					pcanTx(ID, Rxmsg.DATA[0]);
					enable = 0;
				break;
					
				// Floor 2.
				case 0x6 :
					pcanTx(ID, Rxmsg.DATA[0]);
					enable = 0;
				break;
				
				// Floor 3.
				case 0x7 :
					pcanTx(ID, Rxmsg.DATA[0]);
					enable = 0;
				break;
			}
		 }
		 //open and close elevator
		 if(Rxmsg.DATA[0] == 0x8){
			enable = 1;
			
		 }else if (Rxmsg.DATA[0] == 0x9){
			enable = 0;
		 }
		 
		}
	}
	
}

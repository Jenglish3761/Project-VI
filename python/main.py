"""
Main function for Project-VI JAM elevator supervisor

Authors: JAM
"""

import os
import Msg
import Db

def Main():
	
	u = os.system('reset')

	db = Db.Db()
	message = Msg.Msg(0,0);
	door = True
	
	
	try:
		
		while True:
			
			#override
			if (db.override() == "0"):
				u = os.system('clear')
				print("stopped")
				 
				db.state = 0
				
				message.data = db.override()
				message.send()
				
			
			else:
				#restart
				if (db.state == 0):
					print("restarting...")
					message.data = db.getNext()
					message.send()
					#db.state = 1
					
			
				message.recieve()
					
				if message.new is not None:
				#u = os.system('clear')
				
					print(message.new)
					print("current: " + str(db.getCurrent()))
					print("next: " + str(db.getNext()))	
				
					#if from motor controller update current
					if int(message.nodeId) == 101:
						db.updateCurrent(message.data)
				
					#if from a node
					if int(message.nodeId) == 200 or int(message.nodeId) == 201 or int(message.nodeId) == 202 or int(message.nodeId) == 203:
						if int(message.data) == 8:
							door = True
						elif int(message.data) ==9:
							door = False
						else:	
							db.insertDebug(message.nodeId,message.data)
							db.insertQueue(message.nodeId,message.data)
			
				#dequeue if not moving	
				if door == True:
					if(db.getCurrent() == db.getNext()):
				
						message.data=db.dequeue()
				
						#don't bother sending if queue is empty/same floor
						if(message.data!=db.getCurrent()):
							message.send()
					
						db.updateNext(message.data)
					else:
						print("moving........")
						
			
	except(KeyboardInterrupt):
		pass
	
	
if __name__ == '__main__':
	Main()

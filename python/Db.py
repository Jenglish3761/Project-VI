"""
Class definition of type Db to help interface with database

Author: JAM
"""

import MySQLdb

class Db:
	"""
	Creates an object of type Db
	
	Purpose:
	Used for interfacing with databases
	
	Args:
	None
	
	Properties:
	host = address for database
	user = username to access database
	password = password to access database
	database = name of database to connect to
	connection = link to database
	c = cursor to point to connection
	
	Methods:
	__init__()
	opendDb()
	closeDb()
	insertDebug(nodeId, data)
	getCurrent()
	getNext()
	updateCurrent(current)
	updateNext(nextf)
	insertQueue(nodeId, data)
	dequeue()
	
	"""
	
	def __init__(self):
		"""initializes all variables"""
		self.host = "localhost"
		self.user = "ese"
		self.password = "pi"
		self.database = "pi_elevator"
		self.connection = 0
		self.c = 0
		self.updateNext(self.getCurrent())
		self.state = self.override()
		
	
	def openDb(self):
		"""opens all database connections"""
		self.connection = MySQLdb.connect(self.host,self.user,self.password,self.database)
		self.c = self.connection.cursor()
		
	
	def closeDb(self):
		"""closes off all database connections"""
		self.c.close()
		self.connection.commit()
		self.connection.close()	
	
	
	def insertDebug(self, nodeId, data):
		"""insert messages from bus into debug list"""
		self.openDb()
		self.c.execute("INSERT INTO can_debug(id,message) VALUES ({0},{1})".format(nodeId,data))
		self.closeDb()
	
	
	def getCurrent(self):
		"""retrieve current floor - returns int"""
		self.openDb()
		self.c.execute("SELECT current FROM e WHERE id=1")
		current = self.c.fetchone()
		self.closeDb()	
		return int(current[0])
		
		
	def getNext(self):
		"""retrieve next floor - returns int"""
		self.openDb()
		self.c.execute("SELECT next FROM e WHERE id=1")
		nextf = self.c.fetchone()
		self.closeDb()
		return int(nextf[0])	
	
		
	def updateCurrent(self,current):
		"""update current floor"""
		
		if(int(current)<4):
			current = int(current) + 4
		
		self.openDb()
		self.c.execute("UPDATE e SET current={0} WHERE id=1".format(str(current)))
		self.closeDb()
		
	
	def updateNext(self,nextf):
		"""update next floor"""
		self.openDb()
		self.c.execute("UPDATE e SET next={0} WHERE id=1".format(str(nextf)))
		self.closeDb()
	
		
	def insertQueue(self,nodeId, data):
		"""insert messages from bus into queue"""
		self.openDb()
		self.c.execute("INSERT INTO can_data(id,message) VALUES ({0},{1})".format(nodeId,data))
		self.closeDb()
		
	
	def dequeue(self):
		"""dequeue messages to send on bus - returns str"""
		
		self.openDb()
		
		#check for supervisor commands first
		self.c.execute("SELECT message FROM can_data WHERE id=100")
		myresult = self.c.fetchone()
		
		if not myresult:#if no supervisor commands
			self.c.execute("SELECT message FROM can_data")
			myresult = self.c.fetchone()
		
			if not myresult:#if table is empty
				print "table empty"
				self.closeDb()
				return self.getCurrent()
		
			
			self.c.execute("DELETE FROM can_data LIMIT 1")
		else:
			self.c.execute("DELETE FROM can_data WHERE id=100 LIMIT 1")
		
		self.closeDb()
		return str(myresult[0])	
	
	def override(self):
		
		
		self.openDb()
		self.c.execute("SELECT override FROM e")
		myresult = self.c.fetchone()
		self.closeDb()
		return str(myresult[0])
			













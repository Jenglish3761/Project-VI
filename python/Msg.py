"""
Class definition of type Msg to help interface with CAN bus

Author: JAM
"""

import can

class Msg :
	"""
	Creates an object of type Msg
	
	Purpose:
	Used for interfacing with CAN bus
	
	Args:
	nodeId = physical node ID 
	data = data pulled from CAN message
	
	Properties:
	nodeId = id from CAN message
	data = post-split data from CAN message
	bus = CAN bus interface
	new = new pre-split data from CAN message
	
	Methods:
	__init__()
	recieve()
	send()
	
	"""
	def __init__(self,nodeId, data):
		"""initializes all variables"""
		self.nodeId = nodeId
		self.data = data
		self.bus = can.interface.Bus(bustype='pcan', channel="PCAN_USBBUS1", bitrate=125000)
		self.new = 0
	
	def recieve(self):
		"""recieve one message from the CAN bus"""
		self.new = self.bus.recv(1)
		self.new = str(self.new).split()
		self.nodeId = self.new[3]
		self.data = self.new[7]
		
	def send(self):
		"""send one message to the CAN bus"""
		out = can.Message(arbitration_id=0x100, data=[int(self.data)], extended_id=False)
		try:
			self.bus.send(out)
			print("Message sent on {}".format(self.bus.channel_info))
		except:
			print("Message not sent")
	
	
	

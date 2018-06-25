<?php
	/*
	Function: get_current
	Parameters: none
	Return: current floor (int)
	Purpose: gets current floor from MySQL database
	*/
	
	
	function get_current(): int{
		
		try { //try to open databse
			$db = new PDO('mysql:host=127.0.0.1;dbname=elevator','root','');
		}
		catch (PDOException $e){ //if unable to connect
			echo $e->getMessage();
		}
		
		$rows = $db->query('SELECT current FROM info');//pull data from database
		
		foreach ($rows as $row) {
			$curflr = $row[0];	
		}
		
	return $curflr;//return current floor
	}
	
	

	
	
	echo get_current();
?>
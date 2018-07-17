<?php
	/*
	Function: get_current
	Parameters: none
	Return: current floor (int)
	Purpose: gets current floor from MySQL database
	*/
	
	

		
	try { //try to open databse
		$db = new PDO('mysql:host=127.0.0.1;dbname=pi_elevator','ese','pi');
	}
	catch (PDOException $e){ //if unable to connect
		echo $e->getMessage();
	}
		
	$rows = $db->query('SELECT * FROM can_data');//pull data from database
		
		foreach ($rows as $row) {
			print($row[0]);	
			print(':');
			print($row[1]);
			print(' ');
		}
	
	

?>

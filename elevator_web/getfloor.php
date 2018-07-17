<?php
	/*
	Function: get_current
	Parameters: none
	Return: current floor (int)
	Purpose: gets current floor from MySQL database
	*/
	
	
	function get_current(): int{
		
		try { //try to open databse
			$db = new PDO('mysql:host=127.0.0.1;dbname=pi_elevator','ese','pi');
		}
		catch (PDOException $e){ //if unable to connect
			echo $e->getMessage();
		}
		
		$rows = $db->query('SELECT current FROM e');//pull data from database
		
		foreach ($rows as $row) {
			$curflr = $row[0];	
		}
	switch ($curflr){
		case "1":
		case "2":
		case "3":
			$actual = $curflr;
			break;
		case "5":
			$actual = "1";
			break;
		case "6":
			$actual = "2";
			break;
		case "7":
			$actual = "3";
			break;
			
		default:
			$actual = "0";
	}	
	return $actual;//return current floor
	}
	
	

	
	
	echo get_current();
?>

<?php 
	/*
	Function: update
	Parameters: new floor
	Return: new floor (int)
	Purpose: updates MySQL database with 'newfloor' from $_POST
	*/
	
	function update(int $newfloor): int{
		
		$db = new PDO('mysql:host=127.0.0.1;dbname=elevator', 'root', '');//open database
		
		$query = 'UPDATE info SET current = :new WHERE ref = 1';//set query to update current floor
		
		$stmt = $db->prepare($query);
		$stmt->bindvalue('new', $newfloor);
		
		$stmt->execute();
		
		return $newfloor;
	}
	
?>

<html>
	<header>
		<title>JE: elevator</title>	
		<style>
		div{border: 3px solid black; width: 250px; text-align: center;}
		img {width: 50px; height: 50px;}
		</style>
		
		
	</header>
	
	<body onload="showFloorInterval(500); showFloor();">
		
		
		<h1>Elevator Test Zone</h1>
			<!--<div>
			<iframe width='1000' height='150' allowfullscreen seamless src="lights.php" frameborder="1" style="border:0"> </iframe> <br />
			</div>-->
			<br/>
			<?php
				if(isset($_POST['newfloor'])){
					$curflr = update($_POST['newfloor']);
					
				}
			?>
			<div>
				<h1 id='floor'>Current floor # .</h1>  <!-- see body tag as this changes also on page load -->
				1<img src="img/red.png" alt="light1" id="light1" >
				<img src="img/red.png" alt="light2" id="light2" >
				<img src="img/red.png" alt="light3" id="light3" >3
				<br />
			</div>
			<br/>
			<div>
				<form action="elevator.php" method="POST">
					<br />
					Request floor # <input type="number" name="newfloor" max=3 min=1 required />
					<input type="submit" value="go"/>
				
				</form>		
				</div>
			
			
			
		<script src="js/test.js"></script>	
	</body>
</html>
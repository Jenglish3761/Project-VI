
<?php
session_start();


include '../html/navbar.html';
if(isset($_SESSION['username'])){
}
else{
	header("location: /Project-VI/index.php");
	exit();
}
?>
<html>
	<header>
		<title>Elevator Control</title>
		<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<style>
			/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
			img {width: 100px; height: 100px; display: inline-block; box-shadow: none !important;}

			.row.content {height: 450px}

			/* Set gray background color and 100% height */
			.sidenav {
				padding-top: 20px;
				background-color: #f1f1f1;
				height: 100%;
			}

			/* Set black background color, white text and some padding */
			footer {
				background-color: #555;
				color: white;
				padding: 15px;
			}

			/* On small screens, set height to 'auto' for sidenav and grid */
			@media screen and (max-width: 767px) {
				.sidenav {
					height: auto;
					padding: 15px;
				}
				.row.content {height:auto;}
			}
		</style>
	</header>
	<body >

		<h1>Elevator Control</h1>
			<!--<div>
			<iframe width='1000' height='150' allowfullscreen seamless src="lights.php" frameborder="1" style="border:0"> </iframe> <br />
			</div>-->
			<br/>

			<div>
				<h1 id='floor'>Current floor # .</h1>  <!-- see body tag as this changes also on page load -->
				<div ckass="row">
					<div class="col-sm-1">1<img src="img/red.png" alt="light1" id="light1" ></div>
					<div class="col-sm-1"><img src="img/red.png" alt="light2" id="light2" ></div>
					<div class="col-sm-1"><img src="img/red.png" alt="light3" id="light3" >3</div>
				</div>
				<br />
			</div>
			<br/>
			<div>
				<form action="elevator.php" method="POST">
					<br/>
					<br/>
					<!--Floor Buttons-->
					<input type="submit" class="btn btn-success" name="Floor1" value="Floor 1"/>
					<input type="submit" class="btn btn-success" name="Floor2" value="Floor 2"/>
					<input type="submit" class="btn btn-success" name="Floor3" value="Floor 3"/>

					<!--Old Way (number select)
					Request floor # <input type="number" name="newfloor" max=3 min=1 required />
					<input type="submit" value="go"/>-->

				</form>
				</div>




	</body>
</html>
	<script src="js/elevatorEvents.js"></script>
<?php
//Check what button is pressed and update lights
	if(isset($_POST['Floor1'])){
		$curflr = update(1);

	}
	if(isset($_POST['Floor2'])){
		$curflr = update(2);

	}
	if(isset($_POST['Floor3'])){
		$curflr = update(3);

	}

	/*Number select way
	if(isset($_POST['newfloor'])){
		$curflr = update($_POST['newfloor']);
	}*/

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

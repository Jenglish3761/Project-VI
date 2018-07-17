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
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Elevator Web Control</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    img {width: 100px; height: 100px; display: inline-block; box-shadow: none !important;}

    .btn-success{width: 100px; color: black;}

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
</head>
<body>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left">
      <h1 align="center">Elevator Control</h1>
      <hr>
  			<!--<div>
  			<iframe width='1000' height='150' allowfullscreen seamless src="lights.php" frameborder="1" style="border:0"> </iframe> <br />
  			</div>-->
  			<br/>

  			<div align="center">
        <form action="elevator_control.php" method="POST">
          <input type="submit" class="btn btn-success" name="Floor1" value="Floor 1"/>
          <input type="submit" class="btn btn-success" name="Floor2" value="Floor 2"/>
          <input type="submit" class="btn btn-success" name="Floor3" value="Floor 3"/>
        </form>

  				<h1 id='floor'>Current floor # .</h1>  <!-- see body tag as this changes also on page load -->

  					<img src="img/red.png" alt="light1" id="light1" >
  					<img src="img/red.png" alt="light2" id="light2" >
  					<img src="img/red.png" alt="light3" id="light3" >

  				<br />
  			</div>
  			<br/>


    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p id="queue"></p>
      </div>
      <div class="well">
        <p>Placeholder</p>
      </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Copyright &copy 2018 JAM</p>
</footer>

</body>
<script src="js/elevatorEvents.js"></script>
<script src="js/test.js"></script>
</html>

<?php
//Check what button is pressed and update lights
	if(isset($_POST['Floor1'])){
		//$curflr = update(1);
		$curflr = moveElev(5);

	}
	if(isset($_POST['Floor2'])){
		//$curflr = update(2);
		$curflr = moveElev(6);
	}
	if(isset($_POST['Floor3'])){
		//$curflr = update(3);
		$curflr = moveElev(7);
	}


	/*
	Function: update
	Parameters: new floor
	Return: new floor (int)
	Purpose: updates MySQL database with 'newfloor' from $_POST
	*/

	function update(int $newfloor): int{

		$db = new PDO('mysql:host=127.0.0.1;dbname=elevator', 'ese', 'pi');//open database

		$query = 'UPDATE info SET current = :new WHERE ref = 1';//set query to update current floor

		$stmt = $db->prepare($query);
		$stmt->bindvalue('new', $newfloor);

		$stmt->execute();

		return $newfloor;
	}
	function moveElev(int $newfloor): int{
		$db = new PDO('mysql:host=127.0.0.1;dbname=pi_elevator', 'ese', 'pi');//open database
	
		$query = 'INSERT INTO can_data(id,message) VALUES(100,' . $newfloor . ')';//set query to update current floor
		
		$stmt = $db->prepare($query);
		$stmt->bindvalue('new', $newfloor);

		$stmt->execute();

		return $newfloor;
	
	}

?>

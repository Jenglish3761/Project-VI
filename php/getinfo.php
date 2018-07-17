<?php
session_start();
if(isset($_SESSION['username'])){
}
else{
  header("location: /Project-VI/index.php");
	exit();
}
include '../html/navbar.html';


 ?>
<head>
	<title>GetInfo</title>
	<link rel="stylesheet" type="text/css" href="../css/project_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

 <br/>
<?php
$c = 0;
require_once('mysqli_connect.php'); //open connection to database from link

$query = "SELECT*FROM req_access";
//$query = "SELECT first_name, last_name, email, birthday, type, time ,user ,pass FROM req_access"; //set query to grab data from req_access table


$response = @mysqli_query($dbc, $query); //store response of query in variable


echo'<form action="getinfo.php" method="POST">';
if($response){ //if response is not empty print table of values
	echo '<table class="table table-striped table-dark">
  	<thead>
    	<tr>
		<!--<th scope="col">#							</th>-->
				<th scope="col">							</th>
      	<th scope="col">First Name		</th>
      	<th scope="col">Last Name			</th>
      	<th scope="col">Email					</th>
      	<th scope="col">Birthdate			</th>
				<th scope="col">Date Entered	</th>
				<th scope="col">User					</th>
				<th scope="col">Password			</th>
				<th scope="col">Registered		</th>
    	</tr>
  	</thead>
		';



	echo '<tbody>';
		while($row = mysqli_fetch_array($response)){ //while data is pulled fill table rows
			$c =$row['id'];
			if(isset($_POST['delete'.$c.''])){
				delete($c);
				deleteJson($c);
				header("Refresh:0");
			}
			echo//Display table
				'<tr>
				<th scope="row"><input type="submit" class="btn btn-danger" name="delete'.$c.'" value="Delete"/></th>
			<!--<td>' . $row['id'] . 					'</td>-->
					<td>' . $row['first_name'] . 	'</td>
					<td>' . $row['last_name'] . 	'</td>
					<td>' . $row['email'] . 			'</td>
					<td>' . $row['birthday'] . 		'</td>
					<td>' . $row['time'] . 				'</td>
					<td>' . $row['user'] . 				'</td>
					<td>' . $row['pass'] . 				'</td>
					<td>' . $row['registered'] . 	'</td>';
			echo '</tr>';

		}
		echo '</tbody>
			</table>';

} else{
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);

}
echo '</form>';

mysqli_close($dbc);


function deleteJson(int $index) {

	//  Get json data.
	$data = file_get_contents('../json/login.json');

	//	Decode into json array.
	$json_arr = json_decode($data, true);

	//	Unset based on index.
	foreach ($index as $i)	{
		unset($json_arr[$c]);
	}

	//	Save json file.
	file_put_contents('../json/login.json', json_encode($json_arr));
}


function delete(int $c){
	//SET @count =0;
	$db = new PDO('mysql:host=127.0.0.1;dbname=elevator', 'root', '');

	$query = "DELETE FROM req_access WHERE id=$c";

	$stmt = $db->prepare($query);
	$stmt->bindvalue('del', $c);

	$stmt->execute();

	//	Get json data.
	//$data = file_get_contents('../json/login.json');
	//	Decode into json array.
	//$json_arr = json_decode($data, true);
	//unset(json_arr[$c]);
}

?>

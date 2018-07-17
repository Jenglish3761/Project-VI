<?php
$c = 0;
require_once('mysqli_connect.php'); //open connection to database from link

$query = "SELECT*FROM req_access";
//$query = "SELECT first_name, last_name, email, birthday, type, time ,user ,pass FROM req_access"; //set query to grab data from req_access table


$response = @mysqli_query($dbc, $query); //store response of query in variable


  <div class="table-responsive">
<table class="table">
<thead>
<tr>
  <th class="text-center">ID</th>
  <th class="text-center">Message</th>
</tr>
</thead>
<tbody>
<tr>
  <td>100</td>
  <td>05</td>
</tr>
</tbody>
</table>
</div>
</div>

if($response){ //if response is not empty print table of values
	echo '
  <div class="table-responsive"
  <table class="table responsive">
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
			echo//Display table
				'<tr>
					<td>' . $row['first_name'] . 	'</td>
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





function delete(int $c){
	//SET @count =0;
	$db = new PDO('mysql:host=127.0.0.1;dbname=elevator', 'root', '');

	$query = "DELETE FROM req_access WHERE id=$c";

	$stmt = $db->prepare($query);
	$stmt->bindvalue('del', $c);

	$stmt->execute();

	//	Get json data.
	$data = file_get_contents('../json/login.json');
	//	Decode into json array.
	$json_arr = json_decode($data, true);
	unset(json_arr[$c]);
}

?>

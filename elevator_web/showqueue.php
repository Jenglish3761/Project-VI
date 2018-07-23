<?php
$c = 0;
try { //try to open databse
  $db = new PDO('mysql:host=127.0.0.1;dbname=pi_elevator','ese','pi');
}
catch (PDOException $e){ //if unable to connect
  echo $e->getMessage();
}
$rows = $db->query('SELECT * FROM can_data');//pull data from database

if($rows){ //if response is not empty print table of values
	echo '
  <table class="table responsive">
  	<thead>
    	<tr>
		<!--<th scope="col">#							</th>-->
				<th scope="col">ID						</th>
      	<th scope="col">Message	     	</th>
    	</tr>
  	</thead>';



	echo '<tbody>';
		while($row = mysqli_fetch_array($rows)){ //while data is pulled fill table rows
			echo//Display table
			'<tr>
			 <td>' . $row[0] . 	'</td>
		   <td>' . $row[1] . 	'</td>'
			'</tr>';
		}
		echo '</tbody>
			</table>';

} else{
	echo "Couldn't issue database query";
	echo mysqli_error($db);

}

mysqli_close($db);

?>

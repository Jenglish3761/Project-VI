<?php

require_once('../mysqli_connect.php');

$query = "SELECT first_name, last_name, email, birthday, type, FROM req_access";

$response = @mysqli_query($dbc, $query);

if($response){
	echo '<table align="left">
			<tr>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Birthday</td>
				<td>Type</td>
			</tr>';
			
			while($row = mysqli_fetch_array($response)){
				echo '<tr>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['email'] . '</td>
						<td>' . $row['birthday'] . '</td>
						<td>' . $row['type'] . '</td>';
						
				echo '</tr>';
			}
			
		echo '</table>';
} else{
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);
	
}

mysqli_close($dbc);
?>

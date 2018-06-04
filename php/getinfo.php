<head>
	<title>GetInfo</title>
	<link rel="stylesheet" type="text/css" href="../css/project_style.css">
</head>
<body class="border">
<?php

require_once('mysqli_connect.php');

$query = "SELECT first_name, last_name, email, birthday, type, time FROM req_access";

$response = @mysqli_query($dbc, $query);

if($response){
	echo '<table id="gantt" align="left">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Birthday</th>
				<th>Type</th>
				<th>Date Entered</th>
			</tr>';
			
			while($row = mysqli_fetch_array($response)){
				echo '<tr>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['email'] . '</td>
						<td>' . $row['birthday'] . '</td>
						<td>' . $row['type'] . '</td>
						<td>' . $row['time'] . '</td>';
						
				echo '</tr>';
			}
			
		echo '</table>';
} else{
	echo "Couldn't issue database query";
	echo mysqli_error($dbc);
	
}

mysqli_close($dbc);
?>
</body>

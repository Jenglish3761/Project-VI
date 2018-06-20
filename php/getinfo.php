<head>
	<title>GetInfo</title>
	<link rel="stylesheet" type="text/css" href="../css/project_style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
require '../html/navbar.html';
 ?>
 <br/>
<body class="container">

<?php

require_once('mysqli_connect.php'); //open connection to database from link

$query = "SELECT first_name, last_name, email, birthday, type, time ,user ,pass FROM req_access"; //set query to grab data from req_access table

$response = @mysqli_query($dbc, $query); //store response of query in variable

if($response){ //if response is not empty print table of values

	echo '<table id="gantt" align="left">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Birthday</th>
				<th>Type</th>
				<th>Date Entered</th>
				<th>User</th>
				<th>Password</th>
			</tr>';

			while($row = mysqli_fetch_array($response)){ //while data is pulled fill table rows
				echo '<tr>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['email'] . '</td>
						<td>' . $row['birthday'] . '</td>
						<td>' . $row['type'] . '</td>
						<td>' . $row['time'] . '</td>
						<td>' . $row['user'] . '</td>
						<td>' . $row['pass'] . '</td>';
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

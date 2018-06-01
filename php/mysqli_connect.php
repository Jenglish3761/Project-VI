<?php

DEFINE ('DB_USER', 'alex');
DEFINE ('DB_PASSWORD', 'YES');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'elevator');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' . mysqli_connect_error());

?>

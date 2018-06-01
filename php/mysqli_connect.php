<?php

DEFINE ('DB_USER', 'alex');
DEFINE ('DB_PASSWORD', 'jam');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'elevator');

$dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' . mysql_connect_error());

?>

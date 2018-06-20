<!DOCTYPE html>
<?php


require_once('mysqli_connect.php'); //open connection to database from link

$query = "SELECT first_name, last_name, email, birthday, type, time ,user ,pass FROM req_access"; //set query to grab data from req_access table

$response = @mysqli_query($dbc, $query); //store response of query in variable

while($row = mysqli_fetch_array($response)){ //while data is pulled fill table rows

      if(strcmp($row['user'], $_POST['username'] ) == 0 && strcmp($row['pass'], $_POST['password'] == 0)){
        echo 'good';
        echo "<a href="../index.php">Homepage</a>";
      }
      else{
        echo 'bad';
      }


}
?>


<p>Got here </p>

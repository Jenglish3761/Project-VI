<!DOCTYPE html>
<html>

<?php
require '../html/navbar.html';
 ?>

<br/>
<br/>
<?php


require_once('mysqli_connect.php'); //open connection to database from link

$query = "SELECT first_name, last_name, email, birthday, type, time ,user ,pass FROM req_access"; //set query to grab data from req_access table

$response = @mysqli_query($dbc, $query); //store response of query in variable

while($row = mysqli_fetch_array($response)){ //while data is pulled fill table rows

      if(strcmp($row['user'], $_POST['username'] ) == 0 && strcmp($row['pass'], $_POST['password'] == 0)){
        echo 'good';
        header('Location: ../index.php');
      /*function redirect("../index.php") {
        ob_start();
        header('Location: '.'../index.php');
        ob_end_flush();
        die();
      }*/
      }
      else{
        echo 'bad';
      }


}
?>
<p>
<a href='../index.php'>Homepage</a>
<a href="/Project-VI/docs/logbook/jeff.php">Jeff</a>
</p>
<p>Got here </p>
</html>

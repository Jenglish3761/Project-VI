<?php
require '../html/navbar.html';
 ?>

<br/>
<br/>
<?php
  session_start();
/*
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
/*
        }
        else{
          echo 'bad';
        }
      }
*/

//  Get username and password contents.
$users = file_get_contents('../json/login.json');
//  Convert file contents to array.
$userArray = json_decode($users, true);
$accessGranted = -1;
foreach ($userArray as $userAndPass) {
  echo "Username: " . $userAndPass["user"] . ", Password: " . $userAndPass["pass"] . "<br />";
  if(strcmp($userAndPass["user"], $_POST['username']) == 0 && strcmp($userAndPass["pass"], $_POST['password']) == 0)  {
    if($userAndPass["access"] == 1) {
      $accessGranted = 1;
      setcookie('access', $accessGranted);

      $_SESSION['username']=$_POST['username'];
      "Access Granted!" . "<br />";
    } else {
      $registered = 0;
    }

  }

  header('Location: ../index.php');

}
if($accessGranted == -1) {
  header('Location: ../php/login_page.php');
  setcookie('access', $accessGranted);
  setcookie('registered', $registered);
}


?>

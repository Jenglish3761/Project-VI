
<?php
  session_start();

//  Get username and password contents.
$users = file_get_contents('./assignment2.json');
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

  header('Location: ./assignment2.php');

}
if($accessGranted == -1) {
  header('Location: ./assignment2_login.php');
  setcookie('access', $accessGranted);
  setcookie('registered', $registered);
}


?>

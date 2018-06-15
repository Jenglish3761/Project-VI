<?php
$submitted = !empty($_POST);
require '../html/header.html';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Form Handler Page</title>
    <link rel="stylesheet" type="text/css" href="../css/project_style.css">
  </head>
  <body class='border'>
    <p>Form submitted? <?php echo (int) $submitted; ?> </p>
    <p>Your login info is: </p>
    <ul>
      <li><b>username</b>: <?php echo $_POST['username']; ?></li>
      <li><b>password</b>: <?php echo $_POST['password']; ?></li>
    </ul>
  <p>Copyright &copy 2018 JAM</p>
  </body>
</html>

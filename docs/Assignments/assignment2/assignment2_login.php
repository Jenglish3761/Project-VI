<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<?php require '../../../html/navbar.html';
?>
<body>
<div class="container">
  <h2>Assignment 2 Log in</h2>
  <?php
      if(isset($_COOKIE['access']) && $_COOKIE['access'] == -1)  {
        if(isset($_COOKIE['registered']) && $_COOKIE['registered'] == 0)  {
          echo "<p>" . "You are not yet registered!" . "<p>";
          setcookie('registered', 1);
        } else {
          echo "<p>" . "Invalid username and password combination!" . "<p>";
        }

      }
      setcookie('access', 1);
  ?>

  <form class="form-horizontal" action="assignment2_authentication.php" method='post' id='login'>

    <div class="form-group">
      <label for="user" class="control-label col-sm-2" >Username:</label>

      <div class="col-sm-10">
        <span id='userfeedback'></span>
        <input id="user" class="form-control" type="text" placeholder="Username" name="username" required autofocus/>

      </div>
    </div>
    <div class="form-group">
      <label for="pass" class="control-label col-sm-2" >Password:</label>
      <div class="col-sm-10">
        <span id='passwordfeedback'></span>
        <input id="pass" class="form-control" type="password" placeholder="Enter password" name="password" required>

      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-success" type="submit" value='Log in'/>
      </div>
    </div>
  </form>
  <?php

  if(isset($_SESSION['username'])){
    //echo "<button onclick='logout()' id='myBtn' title='Logout'>Logout</button>";
    echo "<a href='./assignment2_logout.php' class='btn btn-danger' role='button'>Logout</a>";
  }
  ?>
  <footer>

    <p id='copyright'>
      Copyright &copy JAM
    </p>
  </footer>
</div>
<script src='../js/eventListeners.js'></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php require '../html/navbar.html' ?>
<body>
<div class="container">
  <h2>Please Log in</h2>
  <form class="form-horizontal" action="1.php" method='post' id='login'>
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
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>

        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-success" type="submit" value='Log in'/>
      </div>
    </div>
  </form>
  <footer>
    <p id='copyright'>
      Copyright &copy JAM
    </p>
  </footer>
</div>
<script src='../js/eventListeners.js'></script>
</body>
</html>

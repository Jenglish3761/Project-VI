<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Request Access</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php require '../html/navbar.html' ?>
<body>
<div class="container">
  <h2>Enter Your Information</h2>
  <form class="form-horizontal" action="request_added.php" method='post'>
    <!--From here...-->
    <div class="form-group">
      <label for="first" class="control-label col-sm-2" >First Name:</label>
      <div class="col-sm-10">
        <input id="first" class="form-control" type="text" placeholder="First Name" name="first_name" required autofocus/>
      </div>
    </div>
    <!--...To here, is one input-->
    <!--From here...-->
    <div class="form-group">
      <label for="last" class="control-label col-sm-2" >Last Name:</label>
      <div class="col-sm-10">
        <input id="last" class="form-control" type="text" placeholder="Last Name" name="last_name" required>
      </div>
    </div>
    <!--...To here, is one input-->
    <!--From here...-->
    <div class="form-group has-feedback has-feedback-left">
      <label for="email" class="control-label col-sm-2" >Email:</label>
      <div class="col-sm-10">
        <input id="email" class="form-control" type="email" placeholder="user@email.ca" name="email" required />
        <i class="form-control-feedback glyphicon glyphicon-envelope"></i>
      </div>
    </div>
    <!--...To here, is one input-->
    <!--From here...-->
    <div class="form-group">
      <label for="birthday" class="control-label col-sm-2" >Birthdate:</label>
      <div class="col-sm-10">
        <input id="birthday" class="form-control" type="date" placeholder="user@email.ca" name="birthday" required />
      </div>
    </div>
    <!--...To here, is one input-->
    <!--
    <div class="form-check form-check-inline">
      <label for="first" class="control-label col-sm-2" >Request Type:</label>
      <input id="inlineRadio1" class="form-check-input" type="radio" name="type"  value="F">
        <label class="form-check-label" for="inlineRadio1">Faculty</label>
      <input id="inlineRadio2" class="form-check-input" type="radio" name="type"  value="S">
        <label class="form-check-label" for="inlineRadio2">Student</label>
      </div>
    -->
      <h2>Create Username and Password</h2>

        <div class="form-group">
          <label for="user" class="control-label col-sm-2" >Username:</label>

          <div class="col-sm-10">
            <span id='userfeedback'></span>
            <input id="user" class="form-control" type="text" placeholder="Username" name="user" required />

          </div>
        </div>
        <div class="form-group">
          <label for="pass" class="control-label col-sm-2" >Password:</label>
          <div class="col-sm-10">
            <input id="pass" class="form-control" type="password" placeholder="Enter password" name="pass" required>
            <span id='passwordfeedback'></span>
          </div>
        </div>


      <br/>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input class="btn btn-success" type="submit" name="submit" value='Submit'/>
      </div>
    </div>

    <div class="form-group">
      <span id='commentfeedback'></span>
      <label for="comment">Comment:</label>
      <textarea id="comment" class="form-control" rows="5" maxlength="180" placeholder="Enter your comment here..."></textarea>


    </div>

  </form>
  <footer>
    <p id='copyright'>
      Copyright &copy JAM
    </p>
<?php

if(isset($_SESSION['username'])){
  echo "<a href='/Project-VI/php/getinfo.php' class='btn btn-danger' role='button'>See the table</a>";
  exit();
}
else{
  exit();
}
?>
  </footer>
</div>
<script src='../js/eventListeners.js'></script>
</body>
</html>

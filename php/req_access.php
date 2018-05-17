<?php
$submitted = !empty($_POST);
?>

<!DOCTYPE html>
<html>
  <head> <title>Request Access Page</title></head>
  <body>
    <p>Form submitted? <?php echo (int) $submitted; ?> </p>
    <p>Your login info is: </p>
    <ul>
      	<li><b>First Name</b>: <?php echo $_POST['firstname']; ?></li>
      	<li><b>Last Name</b>: <?php echo $_POST['lastname']; ?></li>
		
		<li><b>You are a part of </b>: <?php echo $_POST['fac_or_student']; ?></li>
    </ul>
  </body>
</html>
  


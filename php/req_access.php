<?php
$submitted = !empty($_POST);
?>

<!DOCTYPE html>
<html>
  <head> <title>Request Access Form Page</title></head>
  <body>
    <p>Form submitted? <?php echo (int) $submitted; ?> </p>
    <p>The information sent : </p>
    <ul>
      	<li><b>First Name</b>: <?php echo $_POST['firstname']; ?></li>
      	<li><b>Last Name</b>: <?php echo $_POST['lastname']; ?></li>
        <li>Email address: <?php echo $_POST['email']; ?></li>
        <li>Birthdate: <?php echo $_POST['birthday']; ?></li>
				<li><b>Faculty or Student </b>: <?php echo $_POST['fac_or_student']; ?></li>
        <li>
          Other info:
          <ul>
            <?php
             foreach ($_POST['involvement'] as $involve){
               echo '<li>';
               echo $involve;
               echo '</li>';
             }
           ?>
         </ul>
       </li>
    </ul>
  </body>
</html>

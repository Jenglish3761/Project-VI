<html>
  <head>
	  <title>Get info</title>
	  <link rel="stylesheet" type="text/css" href="../css/project_style.css">
    <link rel="stylesheet" type="text/css" href="../css/req_access_style.css">
  </head>
  <?php
  include '../html/navbar.html';
   ?>
  <body>
  <br>
  <form action="request_added.php" method="post">
    <fieldset>

					<legend>Contact Information</legend>
					<!-- Written info -->
					<p><label class='text_label'>First Name:</label> <input class='text_input' type="text" name='first_name'/></p>
				  <p><label class='text_label'>Last Name:</label> 	<input class='text_input' type="text" name='last_name'/><p>
					<p><label class='text_label'>Email:</label> 	<input class='text_input' type='email' name='email'/></p>
 					<p><label class='text_label'>Birthdate:</label> 	<input class='text_input' type='date' name='birthday'/></p>
					<!-- Radio buttons -->
          <p><label class='text_label'>Request Type:</label>
					<label><input type="radio" name='type' value="F" />Faculty</label>
					<label><input type="radio" name='type' value="S" />Student</label>

          <p><input class='submit' type="submit" name="submit" value="Submit"/></p>
		</fieldset>
  </form>
  </body>
</html>

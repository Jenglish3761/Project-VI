<html>
  <head>
	  <title>Get info</title>
	  <link rel="stylesheet" type="text/css" href="../css/project_style.css">
  </head>
  
  <body>
  
  <form action="request_added.php" method="post">
  
    <b>Add new person</b>
    
    <fieldset>
					<legend>Contact Information</legend>
					<!-- Written info -->
					<p><label>First Name: <input class='text' type="text" name='first_name' /></label> </p>
					<p><label>Last Name: 	<input class='text' type="text" name='last_name' /></label> </p>
					<p><label>Email: 	<input class='text' type='email' name='email' /></label></p>
 					<p><label>Birthdate: 	<input class='text' type='date' name='birthday' /></label></p>
					<!-- Radio buttons -->
					<label><input type="radio" name='type' value="F" />Faculty</label>
					<label><input type="radio" name='type' value="S" />Student</label>
		</fieldset>
    
    <p><input type="submit" name="submit" value="Send"/></p>
  
  </form>
  </body>
</html>
  
  

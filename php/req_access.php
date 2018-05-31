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
      	<li><b>First Name</b>: <?php echo $_POST['first_name']; ?></li>
      	<li><b>Last Name</b>: <?php echo $_POST['last_name']; ?></li>
        <li><b>Email address</b>: <?php echo $_POST['email']; ?></li>
        <li><b>Birthdate</b>: <?php echo $_POST['birthday']; ?></li>
				<li><b>Faculty or Student</b>: <?php echo $_POST['type']; ?></li>
        <li>
          <b>Other info</b>:
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
	  
	<?php
	  
	  if(isset($_POST['submit'])){
		  $data_missing = array();
		  
		  if(emtpy($_POST['first_name'])){
			  $data_missing[] = 'First Name';
		  }else {
			  $f_name = trim($_POST['first_name']);
		  }
		  if(emtpy($_POST['last_name'])){
			  $data_missing[] = 'Last Name';
		  }else {
			  $l_name = trim($_POST['last_name']);
		  }
		  if(emtpy($_POST['email'])){
			  $data_missing[] = 'Email';
		  }else {
			  $email = trim($_POST['email']);
		  }
		  if(emtpy($_POST['birthday'])){
			  $data_missing[] = 'Birthday';
		  }else {
			  $birthday = trim($_POST['birthday']);
		  }
		  if(emtpy($_POST['type'])){
			  $data_missing[] = 'Type';
		  }else {
			  $type = trim($_POST['type']);
		  }
		if(empty ($data_missing)){
			require_once('mysqli_connect.php');
			
			$query = "INSERTT INTO req_access (first_name, last_name, email, birthday, type, id) 
				VALUES (?,?,?,?,?, NULL)";
			
			$stmt = mysqli_prepare($dbc,$query);
			
		
				
			mysqli_stmt_bind_param($stmt, "sssss", $f_name, $l_name, $email, $birthday, $type);
			
			mysqli_stmt_execute(stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			if($affected_rows == 1){
				echo 'Person entered';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}else{
				echo mysqli_error();
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
		}else{
			echo 'you missed some data';
	  
	  }
	  
	  
	  
	  ?>
  <p>Copyright &copy 2018 JAM</p>
  </body>
</html>

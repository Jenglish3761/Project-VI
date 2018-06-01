<html>
  <head>
  <title>Request Made</title>
  <link rel="stylesheet" type="text/css" href="../css/project_style.css">
  </head>
  
  <body>
    <?php
    
    if(isset($_POST['submit'])){
    
      $data_missing = array();
      
      
      if(empty($_POST['first_name'])){ //checks if first name was enetered
        $data_missing[] = 'First Name';
        
      } else{
        $f_name = trim($_POST['first_name']);
      }
      
      if(empty($_POST['last_name'])){ //checks if last name was enetered
        $data_missing[] = 'Last Name';
        
      } else{
        $l_name = trim($_POST['last_name']);
      }
      if(empty($_POST['email'])){ //checks if email was enetered
        $data_missing[] = 'Email';
        
      } else{
        $email = trim($_POST['email']);
      }
      
      if(empty($_POST['birthday'])){ //checks if birthday was enetered
        $data_missing[] = 'Birthday';
        
      } else{
        $birthday = trim($_POST['birthday']);
      }
      
      if(empty($_POST['type'])){ //checks if type was enetered
        $data_missing[] = 'Type';
        
      } else{
        $type = trim($_POST['type']);
      }
      if(empty($data_missing)){
        require_once('mysqli_connect.php');
      
        $query = "INSERT INTO elevator (first_name, last_name, email, birthday, id) VALUES (?,?,?,?,NULL)
        
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $f_name, $l_name, $email, $birthday);
        mysqli_stmt_execute($stmt);
        
        $affected = mysqli_stmt_affected_rows($stmt);
        if($affected == 1){
          echo 'Person Entered';
          mysqli_stmt_close($stmt);
          mysqli_close($dbc);
        } else{
          echo mysqli_error();
          mysqli_stmt_close($stmt);
          mysqli_close($dbc);
        }
        
      } else{
        
        echo 'You need to enter:<br/>';
        foreach($data_missing as $missing){
        
          echo "$missing<br/>";
        }
     }
  }
   
?>
</body>
</html>
        

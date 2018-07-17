<html>
  <head>
  <title>Request Made</title>
  <link rel="stylesheet" type="text/css" href="../css/project_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
<?php
require '../html/navbar.html';
 ?>
  <body class='border'>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1); //error checking


    if(isset($_POST['submit'])){ //if submit was pressed from request_access.php

      $data_missing = array();

      //this code fills an array if any data is missing
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
      if(empty($_POST['user'])){ //checks if birthday was enetered
        $data_missing[] = 'Username';

      } else{
        $user = trim($_POST['user']);
      }
      if(empty($_POST['pass'])){ //checks if birthday was enetered
        $data_missing[] = 'Password';

      } else{
        $pass = trim($_POST['pass']);
      }

      /*if(empty($_POST['type'])){ //checks if type was enetered
        $data_missing[] = 'Type';

      } else{
        $type = trim($_POST['type']);
      }*/


      if(empty($data_missing)){ //if no data was missing get ready to send to MySQL

        $dbc = new mysqli("localhost","root", "", "elevator"); //opens a database connection
        $query = "INSERT INTO req_access (first_name, last_name, email, birthday, user, pass, id) VALUES (?,?,?,?,?,?,NULL)"; //sets our query

        $stmt = $dbc->prepare($query); //set statement to prepare to send
        $stmt->bind_param("ssssss",$f_name, $l_name, $email, $birthday, $user, $pass);

        $stmt->execute();


        $affected = mysqli_stmt_affected_rows($stmt);//visible check if data was entered correctly
        if($affected == 1){
          echo 'Person Entered';
          $stmt->close();
          $dbc->close();

        } else{
          echo mysqli_error();
          $stmt->close();
          $dbc->close();


        }

      } else{


        echo 'You need to enter:<br/>';
        foreach($data_missing as $missing){ //shows all values that were missing from request_access.php
          echo "$missing<br/>";
        }
     }



  }



$currentArray["user"] = $_POST['user'];
$currentArray["pass"] = $_POST['pass'];

$content = file_get_contents('../json/login.json');
$tempArray = json_decode($content);
array_push($tempArray, $currentArray);
$jsonAdd = json_encode($tempArray);
file_put_contents('../json/login.json', $jsonAdd);

?>
</br>
<input type="button" onclick="location.href ='request_access.php';" value="Back to previous page"></button></br>
<input type="button" onclick="location.href ='getinfo.php';" value="See the table"></button></br>
</body>
</html>

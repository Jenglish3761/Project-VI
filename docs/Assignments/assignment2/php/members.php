<!DOCTYPE HTML>
<html>
<?php require '/opt/lampp/htdocs/Project-VI/html/navbar.html';?>

<head>
  <meta charset="utf-8">
  <meta name='description' content='Signup page for SW Midterm' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../css/log_req_styles.css" rel="stylesheet">
  <!--<script src='../js/log_req_func.js'></script>-->
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */

    .btn-register {
      width: 100px;
    }
  </style>
  <title>SWQuiz2</title>

</head>

<body>
  <script> alert("hello");</script>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-16">
                <a href="#" class="active" id="register-form-link">Welcome to the Members only page!</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">

                <form id="register-form" action="members.php" method="post" role="form" style="display: block;">
                  <div class="container">
                    <h2>Update fields of the database</h2>
                    <div class="form-group">
                      <label for="Input" class="control-label col-sm-1">Input:</label>
                      <div class="col-sm-4">
                        <input id="inputfield" class="form-control" type="text" placeholder="text / numbers here" name="inputfield" required autofocus/>
                      </div>

                    </div>
                    </br>
                    </br>
                    <label for="Input" class="control-label col-sm-1">ID:</label>
                    <div class="col-sm-4">
                      <input id="IDinput" class="form-control" type="number" placeholder="ID here" name="idnum" required/>
                    </div>
                  </div>
                  </br>
                  </br>
                  <div align="center">
                    <input type="submit" name="update1" id="register-submit1" class="form-control btn btn-register" value="Field 1">
                    <input type="submit" name="update2" id="register-submit2" class="form-control btn btn-register" value="Field 2">
                    <input type="submit" name="update3" id="register-submit3" class="form-control btn btn-register" value="Field 3">
                    <input type="submit" name="update4" id="register-submit4" class="form-control btn btn-register" value="Field 4">
                  </div>
                </form>
              </div>

              <?php
                if(isset($_POST['update1'])){
                  update($_POST['idnum'],'field1',$_POST['inputfield']);
                  echo "<p align='center'>updated Field1</p>";
                  echo $_POST['inputfield'];
                  displayTable();
                }
                if(isset($_POST['update2'])){
                  update($_POST['idnum'],'field2',$_POST['inputfield']);
                  echo "<p align='center'>updated Field2</p>";
                  displayTable();
                }
                if(isset($_POST['update3'])){
                  update($_POST['idnum'],'field3',$_POST['inputfield']);
                  echo "<p align='center'>updated Field3</p>";
                  displayTable();
                }
                if(isset($_POST['update4'])){
                  update($_POST['idnum'],'field4',$_POST['inputfield']);
                  echo "<p align='center'>updated Field4</p>";
                  displayTable();
                }
                if(isset($_POST['insertinto'])){
                  newRow($_POST['Field1in'],$_POST['Field2in'],$_POST['Field3in'],$_POST['Field4in']);
                  displayTable();
                }
                if(isset($_POST['deletebut'])){
                  delete($_POST['delete']);
                  displayTable();
                }

                 ?>
            </div>
          </div>

          <footer>
            <p align="center" id='copyright'>
              Copyright &copy ABradley
            </p>
          </footer>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-16">
                <a href="#" class="active" id="register-form-link"></a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form" action="members.php" method="post" role="form" style="display: block;">
                  <div class="container">
                    <label for="Input" class="control-label col-sm-1">Field1: </label>
                    <div class="col-sm-4">
                      <input id="input" class="form-control" type="text" placeholder="text / numbers here" name="Field1in" required />
                    </div>
                    </br>
                    </br>
                    <label for="Input" class="control-label col-sm-1">Field2: </label>
                    <div class="col-sm-4">
                      <input id="input" class="form-control" type="text" placeholder="text / numbers here" name="Field2in" required />
                    </div>
                    </br>
                    </br>
                    <label for="Input" class="control-label col-sm-1">Field3: </label>
                    <div class="col-sm-4">
                      <input id="input" class="form-control" type="text" placeholder="text / numbers here" name="Field3in" required />
                    </div>
                    </br>
                    </br>
                    <label for="Input" class="control-label col-sm-1">Field4: </label>
                    <div class="col-sm-4">
                      <input id="input" class="form-control" type="text" placeholder="text / numbers here" name="Field4in" required />
                    </div>
                    </br>
                    </br>
                  </div>
                  <input type="submit" name="insertinto" id="register-submit1" class="form-control btn btn-success" value="Insert new row">
                </form>
                <form id="register-form" action="members.php" method="post" role="form" style="display: block;">
                  </br>
                  <div class="container">
                    <label for="Input" class="control-label col-sm-1">ID to Delete:</label>
                    <div class="col-sm-4">
                      <input id="input" class="form-control" type="number" placeholder="text / numbers here" name="delete" required />
                    </div>
                  </div>
                  <input type="submit" name="deletebut" id="register-submit1" class="form-control btn btn-success" value="Delete row">
                </form>
              </div>

            </div>
          </div>

          <footer>
            <p align="center" id='copyright'>
              Copyright &copy ABradley
            </p>
          </footer>
        </div>
      </div>
    </div>
  </div>
</body>

</html>

<?php


function update(int $idNum,string $FieldName,string $newField){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database
  try{
  $query = "UPDATE a2 SET $FieldName = '$newField' WHERE ID = $idNum";//set query to update current floor
  if(!$query){
    throw new Exepction($db->error);
  }
    $stmt = $db->prepare($query);
    $stmt->execute();
}
catch(Exception $e){
  $db->rollback();
  $stmt = $db->prepare($query);
  $stmt->execute();
  echo '<script>
  alert("error");
  </script>';
}

}
/*function update(int $idNum,string $FieldName,string $newField){

  $db = new mysqli('127.0.0.1','root','','assignment');//open database
  try{
    $db->autocommit(FALSE);

    $query = "UPDATE a2 SET '$FieldName' = '$newField' WHERE ID = '$idNum'";//set query to update current floor
    $result = $db->query($query);

    if(!$result){
      $result->free();
      throw new Exception($db->error);
    }
    $db->commit();
    $db->autocommit(TRUE);
    $stmt = $db->prepare($query);
    $stmt->bindvalue('new', $newFloor);

    $stmt->execute();
  }

  catch(Exception $e){
  $db->rollback();
  $db->autocommit(TRUE);
  }
}*/
function newRow(string $Field1, string $Field2, string $Field3, string $Field4){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database
  $query = "INSERT INTO a2 VALUES('','$Field1','$Field2','$Field3','$Field4')" ;
  //$query = 'UPDATE a2 SET field4 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  //$stmt->bindvalue('new1', $Field1);
//$stmt->bindvalue('new2', $Field2);
  //$stmt->bindvalue('new3', $Field3);
  //$stmt->bindvalue('new4', $Field4);



  $stmt->execute();

}

function delete(string $idNum){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database
  $query = "DELETE FROM a2 WHERE ID='$idNum'" ;
  //$query = 'UPDATE a2 SET field4 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->execute();

}

function displayTable(){
  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database
  echo '
  <table class="table responsive">
  	<thead>
    	<tr>
				<th scope="col">ID						</th>
      	<th scope="col">field1	     	</th>
        <th scope="col">field2	     	</th>
        <th scope="col">field3	     	</th>
        <th scope="col">field4	     	</th>
    	</tr>
  	</thead>';
  $rows = $db->query("SELECT*FROM a2");//pull data from database
  echo '<tbody>';
    foreach ($rows as $row) { //while data is pulled fill table rows
      echo//Display table
      '<tr>
       <td>' . $row['ID'] . 	'</td>
       <td>' . $row['field1'] . 	'</td>
       <td>' . $row['field2'] . 	'</td>
       <td>' . $row['field3'] . 	'</td>
       <td>' . $row['field4'] . 	'</td>
      </tr>';
    }
    echo '</tbody>
      </table>';


}

?>

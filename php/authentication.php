<?php
  /*
    FUNCTION:
    PARAMETERS:
    RETURN:
    PURPOSE:
  */
  function get_authentication(): int{
    var granted;

    //  Try to open database.
    try {
      $db = new PDO('mysql:host=127.0.0.1;dbname=elevator','root','');

    } catch (PDOException $e) { //  If unable to connect.
      echo $e->getMessage();
    }

    //  Pull data from database.


    return granted;
  }
 ?>

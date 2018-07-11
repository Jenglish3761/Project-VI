<?php
session_start();
 ?>
<!DOCTYPE html>

<html>
  <head>
    <title>MAIN MENU</title>
	<meta name='description' content='Home page for project VI' />
	<meta name='robots' content='index follow' /> <!-- want page and links to be indexed -->
	<meta http-equiv='author' content='JAM' />
	<meta http-equiv='pragma' content='no-cache' /> <!-- force browser to reload page every time - updates often -->

    	<link rel="stylesheet" type="text/css" href="css/project_style.css">
    	<link rel="icon" type="image/jpg" href="docs/img/jam.jpg">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>

<?php
require 'html/navbar.html';
 ?>


  <body class="container">
<!--    <iframe
    	width='1000'
    	height='150'
    	allowfullscreen
    	seamless
    	src="html/navbar.html"
    			frameborder="0"
    	style="border:0"
    	>
    </iframe><br />-->

  	<h1>JAM MAIN MENU</h1>
    <?php
    if(isset($_SESSION['username'])){
    	echo "<h3>Welcome, " . $_SESSION['username'] . "!</h3><br/>";
    }
    else{
    	echo"<h4>You are not logged in yet. Please log in using the button at the top right.</h4>";

    }
    ?>

	<figure>
		<img src="docs/img/jam.jpg" alt="jam">
  </figure>


  <p>Copyright &copy 2018 JAM</p>
  </body>
</html>

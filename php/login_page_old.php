<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>

    <meta name='description' content='Logint for project VI' />
		<meta name='robots' content='index follow' /> <!-- want page and links to be indexed -->
		<meta http-equiv='author' content='JAM' />
		<meta http-equiv='pragma' content='no-cache' /> <!-- force browser to reload page every time - updates often -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../css/project_style.css">
    <link rel="styleseet" type="text/css" href="../css/req_access_style.css">
		<!--<link href='../css/project_style.css' type='text/css' rel='stylesheet' />-->
    <!--[if lt IE 9]>
      <script src=http://html5shiv.googlecode.com/svn/trunk/html5.js></script>
    <![endif] -->

  </head>
  <?php
  require '../html/navbar.html';
   ?>
  <body>
  <form action='../php/login.php' method='post' id='login'>
      <fieldset>
          <legend>Please Log In</legend>
            <p><label for='user' class='text_label'>Username:</label>
            <input id='user' class='text_input' type='text' name='username' required />
            <span id='userfeedback'></span>
            </p>
            <p>
            <label for='pass' class='text_label'>Password:</label>
            <input id='pass' class='text_input' type='password' name='password' required />
            <span id='passwordfeedback'></span>
            </p>
          <div>
            <input class='logmein' type='submit' value='Log in'/>
          </div>
        </form>
      </fieldset>

      <br /><br />
      <footer>
        <p id='copyright'>
          Copyright &copy JAM
        </p>
      </footer>

    </div>

  <script src='../js/eventListeners.js'></script>
  </body>
</html>

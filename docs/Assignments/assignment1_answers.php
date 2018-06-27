<!DOCTYPE html>
<html>

<head>
  <title>Assignment 1 Answer Page</title>
  <meta name='assignment1' content='Answer page for the first assignment' />
	<meta name='JAM' content='' /> <!-- want page and links to be indexed -->
	<meta http-equiv='author' content='JAM' />
	<meta http-equiv='pragma' content='no-cache' /> <!-- force browser to reload page every time - updates often -->
</head>
<?php
require '../../html/navbar.html';
?>
<link rel="stylesheet" type="text/css" href="../../css/project_style.css" >
  <body class='border'>
    <h1>Assignment 1 Answer Page</h1>
    <h2>HTML</h2>
    <p>Question 1:  Create a GitHub repo for the project&#10003;</p>
    <p>Question 2:  Read the guides....</p>
    <ol type="a">
      <li> What is a branch and how is it different from a <i>master</i> branch?</li>
            <ul><li>A branch is a working environment that seperates itself form the master. It's different from the master branch since the master branch is generally the "deployable" version whereas people mostly do development on the non-master branches.</li></ul>
      <br/><li> What is a <i>commit?</i> Are commits made to a branch or to the master? Explain the importance of commit messages.</li>
            <ul><li>A commit is a git command that tells what changes are about to be pushed. It's important to let others know what you are committing in the message so there are little to know merge errors.</li></ul>
      <br/><li> What is a <i>pull</i> request? How will pull request be useful in Project VI?</li>
            <ul><li>A pull request is a git command that updates your local repository with the most recent version of the remote repository. This will be important in the project for sharing files with group members.</li></ul>
      <br/><li> What happens when you initiate a <i>merge</i>?</li>
            <ul><li>When the merge is initiated,the 2 branches that you are merging will determine whether there are overlaps and bring the two together as best as it can.</li></ul>
      <br/><li> Include a link to your hello-world repository, created in the hello-world activity</li>
            <ul><li><a href="https://jenglish3761.github.io">Link to hello-world</a></li></ul>
    </ol>
    <p>Question 3:  Complete the two tutorials to deploy a remote website from github. <a href="https://jenglish3761.github.io">Link to remote website</a>&#10003;</p>
    <p>Question 4:  Build the <a href="/Project-VI/php/about.php">About Project VI</a> page and a <a href="/Project-VI/index.php">Home Page</a>&#10003;</p>
    <p>Question 5:  Build the <a href="/Project-VI/php/plan.php">Project Plan</a> page and a <a href="/Project-VI/docs/logbook/alex.php">Log Book</a> page for each member in your group.&#10003;</p>
    <p>Question 6:  Add links between your Home Page and all the other pages in your pages in your project (See <a href="/Project-VI/html/navbar.html">The Navbar</a>) as well as a link to go back to the top of the page in your log book.&#10003;</p>
    <p>Question 7:  Add a picture of yourself to your <a href="/Project-VI/docs/logbook/alex.php">Log Book</a> page and add a caption. Add a picture of your team to the <a href="/Project-VI/php/about.php">About Project VI</a> page. Create a logo and add it to your <a href="/Project-VI/index.php">Home Page</a>&#10003;</p>
    <p>Question 8:  Create a Gantt chart of your project plan and add it to your groups <a href="/Project-VI/php/plan.php">Project Plan</a> page.&#10003;</p>
    <p>Question 9:  Create two new pages on your project website: A <a href="/Project-VI/php/login_page.php">Login Page</a> and a <a href="/Project-VI/php/request_access.php">Request Access Page</a>.&#10003;</p>
    <p>Question 10: Add a map to the <a href="/Project-VI/php/about.php">About Project VI</a> page.&#10003;</p>
    <p>Question 11: Add meta tags &#10003;
       <font color="red"><xmp>        <meta name='assignment1' content='Answer page for the first assignment' />
    	<meta name='JAM' content='' /> <!-- want page and links to be indexed -->
    	<meta http-equiv='author' content='JAM' />
    	<meta http-equiv='pragma' content='no-cache' /></xmp></font></p>
    <p>Question 12: Add a Copyright &copy to each page &#10003;</p>
    <p>Question 13: Make a short video to introduce your project and team members and add it to the <a href="/Project-VI/php/about.php">About Project VI</a> page.&#10006;</p>

    <h2>CSS</h2>

    <p>Question 14: Add and style the <a href="/Project-VI/php/ProjectDetails.php">Project Details</a> page with the specified CSS &#10003;</p>
    <ol type="a">
      <li>Follow the steps to create the page itself &#10003;</li>
      <br/><li>Use the CSS format specified &#10003;</li>
    </ol>
    <p>Question 15: Create a specification for the text in the rest of the pages on your site. Implement by creating a CSS sheet that all pages are linked to (for the purposes of later questions, namely the bootsrap ones. Only this page will have the next CSS styles) &#10003;</p>
    <p>Question 16: Edit your project_details_style.css sheet to:</p>
    <ol type="a">
      <li> Place the contents of the entire page in a 950px box with padding 10px and centre it on the page &#10003;</li>
      <br/><li> Centre figures and images on the page &#10003;</li>
      <br/><li> Add borders to the figure and image elements &#10003;</li>
      <br/><li> Add a box shadow to the images &#10003;</li>
      <br/><li> Add rounded corners to the figure boxes &#10003;</li>
    </ol>
    <p>Question 17: Style the <a href="/Project-VI/php/request_access.php">Request Access</a> page so that the inputs are aligned. Add your own design elements to the fieldsets</p>
    <p>Question 18: Create a custom button using an image rollover &#10003;
      <style>
      .submit1{
        color: red !important;
        background: cyan !important;
      }
      .submit1:hover {
        background-color: white !important;
        color: black !important;
        border-color: blue !important;
      }
      .submit1:active{
        background-image: url('../img/alex.jpg') !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        background-color : red !important;
        color : black !important;
        border-color: blue !important;
      }
      </style>
      <input class='submit1' type="submit" name="submit" value="Button"/></p>
    <p>Question 19: Structure the pages in your website using HTML5 layout elements &#10003;</p>
    <p>Question 20: Implement Bootstrap &#10003;</p>
    <p>Question 21: Add your age an a copyright with a date (updates yearly) to your short bio in the project &#10006;</p>
    <p>Question 22: Add the current date and time to the home page of your Project Website (added to <a href="/Project-VI/html/navbar.html">The Navbar</a>) &#10003;</p>
    <p>Question 23: Add event listeners to the <a href="/Project-VI/php/login_page.php">Login Page</a> for the username and password fields &#10003;</p>
    <p>Question 24: Give focus to the Username text input when the Login Page loads &#10003;</p>
    <p>Question 25: In the <a href="/Project-VI/php/request_access.php">Request Access</a> Page, add a textarea box with a maximum of 180 characters &#10003;</p>
    <p>Question 26: Use the Javascript form validation techniques to ensure the user has completed all required fields in the form on the <a href="/Project-VI/php/request_access.php">Request Access</a> Page. &#10003;</p>
    <footer>
    <p>Copyright &copy 2018 JAM</p>
  </footer>
  </body>
</html>

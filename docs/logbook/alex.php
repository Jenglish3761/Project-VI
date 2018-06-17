<!DOCTYPE html>
<html>
	<head>
		<title>Alexanders's Logbook</title>
		<link rel="stylesheet" type="text/css" href="../../css/project_style.css">
		<link rel="icon" type="image/jpg" href="../img/alex.jpg">
  </head>

<?php
require '../../html/navbar.html';
 ?>
	<body>

		<h1>Alexander's logbook</h1>

		<figure>
			<img src="../img/alex.jpg" alt="alex">
			<figcaption><br/>Alexander Bradley - 7228885 3rd year ESE conestoga college</figcaption>
		</figure>
		<h2>PHASE 1</h2>

		<h2>Week 1</h2>

		<h3>May,7/2018</h3>


			<ul>
				<li>First day of classes for semester 6</li>
				<li>Run down of elevator project for this semester given by profs (Ali, Mike)</li>
				<li>"30 000 foot view" - 5 microcontrollers that each are used for a specific function of the elevator</li>
					<ul>
				<li>3 controllers for the floors (copies of each other with slightly varied ins / outs)</li>
				<li>1 controller for the elevator itself (activate lights, choose floor, etc)</li>
				<li>1 controller for motor control and floor location. This is supplied, no motor control code needed, just control from supervisor with instructions.</li>
					</ul>
				<li>Chose group partners (Jeff English, Mike Wright)</li>
			</ul>


		<h3>May,8/2018</h3>


			<ul>
				<li>Connected with pi through PuTTy for the first time from our laptops. Our IP is 192.168.0.200</li>
				<li>Started Gantt chart for project schedule. Still WiP.</li>
			</ul>



		<h3>May,9/2018</h3>

			<ul>
				<li>Started Data comms and SW Eng. Now have a bit of guidance on where to start with project.</li>
				<li>Attempted to use Git / GitHub for the first time. Will take some getting used to.</li>
				<li>Downloaded GitKraken on Linux laptop (Linux desktop version). So far the terminal is more understandable.</li>
				<li>After Mike G. "tested" our elevator, we found that it doesn't work properly. Left while Mike and Dave attempted to determine the problem.</li>


			</ul>

		<h3>May,10/2018</h3>

			<ul>
				<li>Set up a basic webste with both XAMPP and GitHub</li>
				<li>Started to store and update logbook on project webpage hosted on GitHub</li>
			</ul>

		<h3>May,11/2018</h3>

			<ul>
				<li>Tested CAN functionality on Axman board with elevator</li>
				<li>Used P-CAN viewer to make sure Axman is transmitting on CAN</li>
			</ul>
		<h2>Week 2</h2>

		<h3>May,14/2018</h3>
			<ul>
				<li>Configured P-CAN viewer to show all nodes sending properly</li>
				<li>Debrief</li>
			</ul>
		<h3>May,15/2018</h3>
			<ul>
				<li>Set up website onto my laptop with XAMPP so that it is no longer only located on GitHub</li>
				<li>Created quick pull .sh program to do pulls without being in website folder</li>
				<li>Math Quiz</li>
			</ul>
		<h3>May,16/2018</h3>
			<ul>
				<li>Started Data Comm assignment</li>
				<li>Seperated files out for the website and cleaned up some code</li>
			</ul>
		<h3>May,17/2018</h3>
			<ul>
				<li>Floor node updated to send floor number on reset</li>
				<li>Finished Data Comm assignment</li>
			</ul>
		<h3>May,18/2018</h3>
			<ul>
				<li>Work on floor node sending data to Pi indicating which floor to go to</li>
				<li>Small program made on Pi to recieve data from floor nodes and send to motor controller</li>

			</ul>

		<h2>Week 3</h2>

		<h3>May,21/2018</h3>
			<ul>
				<li>Holiday</li>

			</ul>
		<h3>May,22/2018</h3>
			<ul>
				<li>Recieved Natural Sciences assignment</li>
				<li>Worked on getting push button to work with elevator project for each floor (just call elevator to floor)</li>
				<li>Finished button, then moved on to getting LED's working to tell what floor elevator is on</li>
				<li>LED's now showing where the elevator is located</li>
			</ul>
		<h3>May,23/2018</h3>
			<ul>
				<li>Data Comm quiz</li>
			</ul>
		<h3>May,24/2018</h3>
			<ul>
				<li>Changed buttons for the elevator nodes</li>
				<li>Re-wire lights and buttons to make more sense</li>
				<li>Clean up floor node code</li>
			</ul>
		<h3>May,25/2018</h3>
			<ul>
				<li>Added code to Floor 2 to turn on an indicator light until elevator is there (WIP)</li>
				<li>Thermo Quiz 1</li>
			</ul>
		<h2>Week 4</h2>

		<h3>May,28/2018</h3>
			<ul>
				<li>Updated website with pictures, schematics, status report, and logbook info</li>
				<li>Pushed website onto PI</li>
				<li>Debrief</li>
			</ul>
		<h3>May,29/2018</h3>
			<ul>
				<li>Updated floor nodes to keep call lights on until the elevator reaches that floor</li>
				<li>Started elevator node</li>
				<li>Wired elevator node with 5 buttons, 8 lights</li>
				<li>Buttons are</li>
				<ul>
					<li>BTN1 - FLOOR 1</li>
					<li>BTN2 - FLOOR 2</li>
					<li>BTN3 - FLOOR 3</li>
					<li>BTN4 - CLOSE DOOR(enable elevator)</li>
					<li>BTN5 - OPEN DOOR(disable elevator)</li>
				</ul>
				<li>Elevator code WIP</li>
			</ul>
		<h3>May,30/2018</h3>
			<ul>
				<li>Elevator code now properly calls elevators to the floor on respective button press</li>
				<li>Elevator keeps call light on until floor is reached</li>
				<li>Elevator Open / Close lights working just on button press</li>
			</ul>
		<h3>May,31/2018</h3>
			<ul>
				<li>Fixed bit masking in elevator program so changing lights doesnt affect all lights</li>
				<li>Fixed ALWAYS FALSE warning on switch case to turn on and off indicators</li>
			</ul>
		<h3>June,1/2018</h3>
			<ul>
				<li>Open light changed to light up on arrival to floor</li>
				<li>Supervisor program disables elevator on Open command, until closed</li>
			</ul>
		<h2>Week 5</h2>

		<h3>June,4/2018</h3>
			<ul>
				<li>Updated status report</li>
				<li>Debrief</li>
			</ul>
		<h3>June,5/2018</h3>
			<ul>
				<li>Study for Math Midterm</li>
				<li>Study for Psychology Test</li>
			</ul>
		<h3>June,6/2018</h3>
			<ul>
				<li>Study for Math Midterm</li>
				<li>Psychology Test</li>
			</ul>
		<h3>June,7/2018</h3>
			<ul>
				<li>Math Midterm</li>
				<li>Study for Data Comms Quiz</li>
			</ul>
		<h3>June,8/2018</h3>
			<ul>
				<li>Data Comm Quiz</li>
			</ul>
		<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<p>Copyright &copy 2018 JAM</p>
</body>

<script>
// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

</html>

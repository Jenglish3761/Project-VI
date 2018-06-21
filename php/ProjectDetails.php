
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Project Details</title>
		<meta name="description" content="This is the project charter page of our project" />
		<meta name="robots" content="noindex nofollow" />  <!-- do not want page or any of its links to be indexed -->
		<meta http-equiv="author" content="JAM" />
		<meta http-equiv="pragma" content="no-cache" /> <!-- want browser to reload this page every time -->
	</head>
	<?
	require '../html/navbar.html';
	?>
	<link rel="stylesheet" type="text/css" href="../css/project_details_style.css">
	<body class="border">
		<h1>Project Details</h1>
		<h2>Project Description</h2>
		<p>The overall project plan (to be completed in <span class="mkunderlined">3 phases</span>) is to build and control an elevator, leveraging the use of a CAN bus communications environment, coupled with networked systems to create a means of tracking the elevator's operational/diagnostics data. The elevator car's position and status must also be viewable to computers over the Internet.  See the system diagram, below.
		The <span class="mkbold">final project demonstration</span> begins with the elevator car at an initial position. As buttons are pressed at each floor, the system will direct the car to service the requests in a safe and controlled manner, subject to requirements for appropriate and predictable speed and acceleration. The system will use a distance sensor to track the car position at all times, determining the distance from the bottom of the elevator shaft, and thus determine the next floor number.  Buttons will be handled over the <span id="can">CAN bus</span>.
		In the first phase of the project, application of the above mentioned concepts and skills is demonstrated through the specification, design, programming, and testing of an <span id="hcs12">HCS12-based embedded controller</span> (Axeman development unit) or similar for low-level communications between buttons, displays, and sensors (implemented via hardware available in our lab). This controller will communicate with the sensors and call buttons using the CAN bus (see Figure-1).
		Each call station will consist of</p>

		<ul>
			<li>Two buttons (up and down) and two LEDs to indicate the selection</li>
			<li>A display panel, which will show the elevator car's present position</li>
		</ul>

		<p>There will be another controller for:</p>

		<ul>
			<li>Floor selection buttons and an LED for each button, and</li>
			<li>Two buttons for door-open and door-close and with associated LEDs.</li>
		</ul>

		<p>The distance sensor will be interfaced directly to the controller to provide a distance estimate, which can be displayed on an LCD or 7-segment LED display and ultimately used for positional feedback.
		The elevator <span class="mkbold">motor</span> will interface with the controller via servo electronics.</p>

		<figure>
			<img src="../docs/img/fig1.jpg" />   <!--   -->
			<figcaption>Figure-1 <br />(Note: Above figure depicts an approximate schematic of the system. Actual implementation may be different from this.)</figcaption>
		</figure>

		<p>An additional requirement is that student groups will create a <span class="mkunderlined">common</span> CAN message specification to which all groups will adhere.  The intent is to ensure that any embedded system from one group can be removed and added to another group, with no required changes in embedded software.
		</p>

		<p>The minimal project (in <span class="mkbold">Phase 1</span>) is a CAN network consisting of the controller, the call stations, the distance sensor, and LCD/7 Segment display.  Extra credit projects will extend both the hardware design and the software capabilities to include additional functionality; however, these must be approved by the faculty team prior to embarking on extra credit work. Examples of possible extensions include a passenger on/off detection and counter system to enable the tracking of elevator utilization, or a security camera control system.
		</p>

		<p>In <span class="mkbold">Phase 2</span>, the elevator controller will also interface to a PC on a Local Area Network (LAN), and thence <span class="mkunderlined">to the Internet</span> (see Figure-2). Each group will make its own decision on what type of CAN-LAN interface it wants to implement. Events from the elevator's operation will be logged (by the controller) to a computer on the LAN (called the Elevator Monitor or EM), which will contain software designed, programmed and tested by the student group. This latter software will consist of two parts:
		</p>

		<ol>
			<li><span class="mkbold">A data server </span> which will monitor and store data from the controller/CAN network, and</li>
			<li>
				<span class="mkbold">A diagnostics display program</span> that will collect and display this data on the elevator module or at any other PC connected by a LAN interface to the elevator module.
				An aspect of elevator control (such as shutting the elevator down completely, or requesting the elevator via a phone app rather than the floor button) will be included.
				Finally, in Phase 2, software will be developed to retrieve elevator status information from the elevator module, over an Internet connection.
			</li>
		</ol>

		<figure>
			<img src="../docs/img/fig2.jpg" />   <!--   -->
			<figcaption>Figure-2 <br />(Note: Above figure depicts an approximate schematic of the system. Actual implementation may be different from this.)</figcaption>
		</figure>

		<p>In <span class="mkbold">Phase 3</span> the two modules (developed in phases 1 and 2) will be integrated to complete the system. This phase also encourages each student group to incorporate features that are not specifically stated in this charter document. This phase includes a final demonstration, oral presentation and report.
		Students will work in groups of three or four students (if applicable).</p>

		<h2>Milestones</h2>
		<p>This is a summary of the milestone dates for each phase. A complete breakdown of the detailed tasks in each phase may be found in the <a href="../docs/img/Project_Charter.pdf">Project Charter</a></p>
		<table>
			<thead>
				<tr>
					<th>Deadline</th>
					<th>Deliverable</th>
				</tr>
				<tr>
					<td>Begining of Week 5</td>
					<td>Phase 1 tasks</td>
				</tr>
				<tr>
					<td>Begining of Week 12</td>
					<td>Phase 2 tasks</td>
				</tr>
				<tr>
					<td>End of Week 14</td>
					<td>Phase 3 tasks</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
				</tr>
			</thead>
			<tbody></tbody>
			<tfoot></tfoot>
		</table>
		<h2>Status Report</h2>
		<embed src="../docs/img/EPVI-Weekly-Status-Report_Week7.pdf" width="930" height="500" type='application/pdf' alt="schematic">
		<h2>Schematics</h2>

		<h3>Elevator Node</h3>
		<embed src="../docs/img/Elevator_Node.pdf" width="930" height="500" type='application/pdf' alt="schematic">

		<h3>Floor Node 1</h3>
		<embed src="../docs/img/Floor_Node_1.pdf" width="930" height="500" type='application/pdf' alt="schematic">

		<h3>Floor Node 2</h3>
		<embed src="../docs/img/Floor_Node_2.pdf" width="930" height="500" type='application/pdf' alt="schematic">

		<h3>Floor Node 3</h3>
		<embed src="../docs/img/Floor_Node_3.pdf" width="930" height="500" type='application/pdf' alt="schematic">

		<p>Copyright &copy 2018 JAM</p>
	</body>
</html>

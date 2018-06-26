window.onload=showFloorInterval(750);
window.onload=showFloor();

function showFloor(){

	var request = new XMLHttpRequest();
	//console.log("request sent");//TESTING

	request.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200) {

			var resp = this.responseText;

			//updates document properties based on response
			document.getElementById("floor").innerHTML = "Current floor # " + resp;
			lights(resp);

			//console.log(resp);//TESTING
			//console.log("request finished");//TESTING
		}
	};

		request.open("GET", "/Project-VI/elevator_web/getfloor.php?q=", true);
		request.send();
}

function showFloorInterval(millisec) {
    setInterval(showFloor, millisec);
}

function lights(floor){


	switch(floor) {
		case "1":
			document.getElementById("light1").src='img/green.png'
			document.getElementById("light2").src='img/red.png'
			document.getElementById("light3").src='img/red.png'
			break;
		case "2":
			document.getElementById("light1").src='img/red.png'
			document.getElementById("light2").src='img/green.png'
			document.getElementById("light3").src='img/red.png'
			break;
		case "3":
			document.getElementById("light1").src='img/red.png'
			document.getElementById("light2").src='img/red.png'
			document.getElementById("light3").src='img/green.png'
			break;
	}
}

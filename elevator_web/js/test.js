window.onload=showQueueInterval(750);
window.onload=showQueue();
function showQueue(){

	var request = new XMLHttpRequest();
	//console.log("request sent");//TESTING

	request.onreadystatechange = function(){

		if(this.readyState == 4 && this.status == 200) {

			var resp = this.responseText;

			//updates document properties based on response
			document.getElementById("queue").innerHTML = "Queue: " + resp;
			

			//console.log(resp);//TESTING
			//console.log("request finished");//TESTING
		}
	};

		request.open("GET", "/Project-VI/elevator_web/queue.php?q=", true);
		request.send();
}

function showQueueInterval(millisec) {
    setInterval(showQueue, millisec);
}

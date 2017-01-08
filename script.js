var button_0 = document.getElementById("button_0");
var button_1 = document.getElementById("button_1");
var button_2 = document.getElementById("button_2");

//Create an array for easy access
var Buttons = [ button_0, button_1, button_2];

//This function asks for gpio.php, receives data and updates the index.php pictures
function change_pin ( pic ) {
var data = 0;
//send the pic number to gpio.php to change
//http request
	var request = new XMLHttpRequest();
	request.open( "GET" , "gpio.php?pic=" + pic, true);
	request.send(null);
	//receive information
	request.onreadystatechange = function () {
		if (request.readyState == 4 && request.status == 200) {
			data = request.responseText;
			//update the index pic
			if ( !(data.localeCompare("0")) ){
				Buttons[pic].src = "data/red.png";
			}
			else if ( !(data.localeCompare("1")) ) {
				Buttons[pic].src = "data/green.png";
			}
			else if ( !(data.localeCompare("fail"))) {
				alert ("Something went wrong!" );
				return ("fail");			
			}
			else {
				alert ("Something went wrong!" );
				return ("fail"); 
			}
		}
		//test if fail
		else if (request.readyState == 4 && request.status == 500) {
			alert ("server error");
			return ("fail");
		}
		//else 
		else if (request.readyState == 4 && request.status != 200 && request.status != 500 ) { 
			alert ("Something went wrong!");
			return ("fail"); }
	}	
	
return 0;
}
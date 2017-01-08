<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Raspberry Pi Web Gpio</title>
    </head>
 
    <body style="background-color: white;">
    <!-- Populate On/Off button's picture -->
	<?php
	$val_array = array(0,0,0);
	//this php script generate the first page
	for ( $i = 0; $i < 3; $i++) {
		//set the pin's mode to output mode and get status
		system("gpio mode ".$i." out");
		exec ("gpio read ".$i, $val_array[$i], $return );
	}
	//for loop to read the values
	$i =0;
	for ($i = 0; $i < 3; $i++) {
		//if off
		if ($val_array[$i][0] == 0 ) {
			echo ("<img id='button_".$i."' src='data/red.png' onclick='change_pin (".$i.");'/>");
		}
		//if on
		if ($val_array[$i][0] == 1 ) {
			echo ("<img id='button_".$i."' src='data/green.png' onclick='change_pin (".$i.");'/>");
		}
		echo($i);
		echo("<br>");
	}
	?>
	 
	<!-- javascript -->
	<script src="script.js"></script>
    </body>
</html>

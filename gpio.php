<?php
if (isset ( $_GET["pic"] )) {
	$pic = strip_tags ($_GET["pic"]);
	
	//test if value is a number between 0 and 2
	if ( (is_numeric($pic)) && ($pic <= 2) && ($pic >= 0) ) {
		
		//set the gpio's mode to output	mode	
		system("gpio mode ".$pic." out");
		//reading gpio pin's status
		exec ("gpio read ".$pic, $status, $return );
		//set the gpio to high/low
		if ($status[0] == "0" ) { $status[0] = "1"; }
		else if ($status[0] == "1" ) { $status[0] = "0"; }
		system("gpio write ".$pic." ".$status[0] );
		//reading gpio pin's status again
		exec ("gpio read ".$pic, $status, $return );
		//print it to the client on the response
		echo($status[0]);
		
	}
	else { echo ("fail"); }
} //print fail if we cannot use the values
else { echo ("fail"); }
?>
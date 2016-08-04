/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

<?php
	
	/* This code returns a list of parks from the database according to the user's coordinates */
	
	include 'setup.inc';
	
	$lat = $_GET["lat"];
	$lon = $_GET["lon"];
	
	$query = "SELECT ParkName, Street, Suburb, ParkID, Latitude, Longitude FROM parks WHERE (($lat - 0.02) < Latitude) && (Latitude < ($lat + 0.02)) && (($lon - 0.02) < Longitude) && (Longitude < ($lon + 0.02))";
	$results = $pdo->query($query);
	$maps = $pdo->query($query);
	
	include 'searchResultsTrueLoc.inc';
	
?>

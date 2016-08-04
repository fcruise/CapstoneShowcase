<html>
<?php
	
	include 'setup.inc';
	
	$lat = $_GET["lat"];
	$lon = $_GET["lon"];
	
	$query = "SELECT ParkName, Street, Suburb, ParkID, Latitude, Longitude FROM parks WHERE (($lat - 0.02) < Latitude) && (Latitude < ($lat + 0.02)) && (($lon - 0.02) < Longitude) && (Longitude < ($lon + 0.02))";
	$results = $pdo->query($query);
	$maps = $pdo->query($query);
	
	include 'searchResultsTrueLoc.inc';
	
?>
</html>
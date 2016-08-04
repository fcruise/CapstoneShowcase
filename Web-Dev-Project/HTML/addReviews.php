<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, April 2016  */

	include 'setup.inc';

	// Prepare user inputs of review to add into database
	$date = date("Y-m-d");
	$reviewinput = $_POST['reviewinput'];
	$rating = $_POST['Rating'];
	$park = $_POST['parkID'];
	$username = $_POST['username'];
	
	
	// Prepare statement for inserting into database
	$query = $pdo -> prepare('INSERT INTO reviews (ParkID, ReviewDate, Rating, Content, Username) VALUES (:parkid, :date, :rating, :content, :username)');
	
	$query -> bindValue(':parkid', $park);
	$query -> bindValue(':date', $date);
	$query -> bindValue(':rating', $rating);
	$query -> bindValue(':content', $reviewinput);
	$query -> bindValue(':username', $username);
	$query -> execute();
	
	// Confirms the review has been submitted
	include "reviewOK.php";

?>

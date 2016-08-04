<!--  Authors: Lok Sum Lo (n9050159) -->
<!--  CAB230 Wec Computing Assignment, April 2016 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Dog park</title>
		<meta charset="UTF-8"> 
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>

	<!-- Displays park details, user reviews and ratings -->

		<div class="container">
			<?php include 'menu.inc' ?>
			<?php include 'setup.inc'?>
			<?php include 'parkInfo.php'?>
			<?php include 'reviews.php'?>
		
			<div class="wrapper">
				<div class="content">
					<!-- Displays all the park information, including name, address, average rating and map -->
					<?php displayParkInfo($results, $avg); ?>
					
					<!-- Adds microdata for Place and Reviews of the park -->
					<?php microData($micro, $rev_micro); ?>
					
					<br>
					<br>
					
					<h2>Reviews</h2>
					
					<!-- Displays existing user reviews -->
					<?php displayReviews($reviews); ?>
					
					<!-- Displays user input field for a new review if logged in -->
					<?php loggedIn(); ?>

				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	
	</body>
</html>
<!--  Authors: Lok Sum Lo (n9050159) -->
<!--  CAB230 Wec Computing Assignment, April 2016 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Search results</title>
		<meta charset="UTF-8"> 
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="scripts.js"></script>
	</head>

	<body>
	
	<!-- Page displays message in case there are no parks matching the user's search criterias -->
	
		<div class="container">
			<?php include 'menu.inc' ?>
			<?php include 'setup.inc'?>
			<?php require_once 'searchFunctions.inc' ?>
			
			<div class="wrapper">
				<div class="content">
					<h1>Search Results</h1>
					
					<?php displaySearchCriteria(); ?>
					<p class="errorMessage">Sorry, we can't find any parks matching your criteria.</p>
	            	<a class="submitButton" value="SEARCH AGAIN" id="searchAgain" href="search.php" style="text-decoration:none;top:50px;">SEARCH AGAIN</a> 
	            
				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	
	</body>
	
</html>
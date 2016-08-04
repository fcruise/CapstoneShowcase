<!--  Authors: Lok Sum Lo (n9050159), Thiline Widanagamage (n9185691) -->
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
	
	<!-- search results in a tabular format, links to individual item's page -->
	
		<div class="container">
			<?php include 'menu.inc' ?>
			<?php require_once 'searchFunctions.inc' ?>
			<?php include 'setup.inc'?>
			
			<div class="wrapper">
				<div class="content">
					<h1>Search Results</h1>
					
					<?php displaySearchCriteria(); ?>
					<div id='mapSearch'></div>
					<?php displayMap($maps) ?>
					<?php displayParks($results); ?>

	            	<a class="submitButton" value="SEARCH" id="searchAgain" href="search.php" style="text-decoration:none;top:50px;">SEARCH AGAIN</a> 
	            

				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	
	</body>
	
</html>
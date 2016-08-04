<!--  Authors: Lok Sum Lo (n9050159), Thiline Widanagamage (n9185691) -->
<!--  CAB230 Wec Computing Assignment, April 2016 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Home - Dog Park Searcher</title>
		<meta charset="UTF-8"> 
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<!-- search results in a tabular format, links to individual item's page -->
	
	<body>
		<div class="container">
		
			<?php include 'menu.inc' ?>
			
			<div class="wrapper">
				<div class="content">
					<div class="home">
						<?php if($welcome) echo "<h2>Congratulations, your registration is complete and you can now log in.</h2>"; $welcome = false; ?>
						<h1>Find a dog park</br>near you.</h1>
						<p id="tagline">Looking for a dog park? You've come to the right place. Dog Park Searcher can find the nearest park for you and your canine friend.</p>
						</br></br><a id="searchNow" href="search.php">SEARCH NOW</a>
					</div> <!-- home -->
				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	</body>
	
</html>
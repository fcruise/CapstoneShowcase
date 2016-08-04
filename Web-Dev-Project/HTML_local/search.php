<!--  Authors: Lok Sum Lo (n9050159), Thiline Widanagamage (n9185691) -->
<!--  CAB230 Wec Computing Assignment, April 2016 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Search for a dog park</title>
		<meta charset="UTF-8"> 
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	

	<body>
	
	<!-- search by SUBURB (drop down list), NAME (text box), RATING, or LOCATION -->
	
		<div class="container">
			<?php include 'menu.inc' ?>
			<?php include 'setup.inc'?>
			
			<div class="wrapper">
				<div class="content">
					<h1>Search</h1>
					<form id="searchForm" name="searchForm" action="searchResults.php" method="post">
						<ul id="searchFormList">
							<li>Park name:<input type="text" pattern="[\ a-zA-Z0-9]*" id="parkName" name="parkName" title="Please only use letters (A-Z) and numbers (0-9)."></li>

							<li>Rating:
							<select id="rating" name="rating">
							<option disabled selected value>Select a rating</option>
								<option value=1>1/5</option>
								<option value=2>2/5</option>
								<option value=3>3/5</option>
								<option value=4>4/5</option>
								<option value=5>5/5</option>
							</select>
							<li>Suburb:
							<select id="suburb" name="suburb">
								<?php include 'suburbs.inc' ?>
							</select>
							</li>
							
						</ul> <!-- searchFormList -->
						<input type="submit" class="submitButton" value="SEARCH" id="submitSearch">
						<label id="orLabel">O R</label>
						<input type="button" class="submitButton" value="SEARCH BY CURRENT LOCATION" id="submitLocation" onclick="getLocation()" style="text-decoration:none;top:30px;">

					</form>
				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	
	</body>
	
</html>
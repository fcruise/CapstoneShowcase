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
					<div class="table">
	                <table>
	                    <tr id="headings">
	                       <td>Park Name</td>
	                       <td>Street Name</td>
	                       <td>Suburb</td>
	                    </tr>
	                    <tr>
		                   <td><a href="park.php">Amelia Park</a></td>
		                   <td>McCord Street</td>
		                   <td>Gordon Park</td>
	                    </tr>
	                    <tr>
	                        <td><a href="park.php">Archer Street Park</a></td>
	                        <td>Archer Street</td>
	                        <td>Gordon Park</td>
	                    </tr>
	                    <tr>
	                        <td><a href="park.php">Kokoda Park</a></td>
	                        <td>Tindal Street</td>
	                        <td>Gordon Park</td>
	                    </tr>
	                    <tr>
	                        <td><a href="park.php">Thistle Street Park</a></td>
	                        <td>Thistle Street Street</td>
	                        <td>Gordon Park</td>
	                    </tr>
	                    <tr>
	                        <td><a href="park.php">Wally Bourke Park</a></td>
	                        <td>Kate Street</td>
	                        <td>Gordon Park</td>
	                    </tr>
	                </table>
	            	</div>

	            	<a class="submitButton" value="SEARCH" id="searchAgain" href="search.html" style="text-decoration:none;top:50px;">SEARCH AGAIN</a> 

				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	
	</body>
	
</html>
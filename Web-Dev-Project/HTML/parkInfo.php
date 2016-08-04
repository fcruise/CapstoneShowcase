<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

	// All functions required to display the individual park pages are stored in this file

	include 'setup.inc';
	include 'searchFunctions.inc';
	
	$parkID = $_GET['ParkID'];
	
	// Queries are made for different sessions of the page, returning information of the selected park
	$query = "SELECT ParkName, Street, Suburb, DogParkName, DogParkArea, Latitude, Longitude FROM parks WHERE ParkID = $parkID";
	$query_rating = "SELECT AVG(rating) FROM reviews WHERE ParkID = $parkID";
	$query_rev = "SELECT Rating, Content, ReviewDate, Username FROM reviews WHERE ParkID = $parkID";
	$query_micro = $query_rev;
	
	$results = $pdo->query($query);
	$micro = $pdo->query($query);
	$avg = $pdo->query($query_rating);
	$reviews = $pdo->query($query_rev);
	$rev_micro = $pdo->query($query_micro);
	
	// Displays all existing reviews on the page
	function displayReviews($reviews){
		if ($reviews->rowCount()==0){
			echo "<h3>No reviews submitted yet.</h3>";
		}
		else{
			echo '<div class="userComments">';
			foreach ($reviews as $review){
				echo '<div class="userCommentsInner">';
				echo "<h3>$review[Username] said on $review[ReviewDate]</h3>";
				echo "<ul>";
				echo "<li><b>Rating: $review[Rating]/5</b></li>";
				echo "<li>$review[Content]</li>";
				echo "</ul>";
				echo '</div>';
			}
			echo '</div>';
		}
	}
	
	// Adds microdata about the park and reviews by using json
	function microData($micro, $reviews){
		foreach ($micro as $data){
			$name = formatString($data['ParkName']);
			$lat = $data['Latitude'];
			$lng = $data['Longitude'];
			$street = formatString($data['Street']);
		}
		
		echo "
		<script type=\"application/ld+json\">{
		  \"@context\": \"http://www.schema.org/\",
		  \"@type\": \"Place\",
		  \"geo\": {
			\"@type\": \"GeoCoordinates\",
			\"latitude\": \"$lat\",
			\"longitude\": \"$lng\"
		  },
		  \"name\": \"$name\",
		  \"address\": {
			  \"@type\": \"PostalAddress\",
			  \"addressLocality\": \"Brisbane\",
			  \"addressRegion\": \"QLD\",
			  \"streetAddress\": \"$street\"
		  },
		  \"url\": \"http://fastapps04.qut.edu.au:8080/n9050159/HTML/park.php?ParkID=$_GET[ParkID]\",";
		  
		echo "\"review\": [";
		  
		foreach ($reviews as $review){
			echo "
			{
			  \"@type\": \"Review\",
			  \"author\": \"$review[Username]\",
			  \"datePublished\": \"$review[ReviewDate]\",
			  \"description\": \"$review[Content]\",
			  \"name\": \"$name Review\",
			  \"reviewRating\": {
				\"@type\": \"Rating\",
				\"bestRating\": \"5\",
				\"ratingValue\": \"$review[Rating]\",
				\"worstRating\": \"1\"
			  }
			},
			";
		}
		
		echo "]}</script>";
	}
	
	// Displays park name, address, park size, average rating and google map for selected park
	function displayParkInfo($results, $avg){
		foreach ($results as $park){
			$pName = formatString($park['ParkName']);
			$pSt = formatString($park['Street']);
			$pSub = formatString($park['Suburb']);
			$pDPname = formatString($park['DogParkName']);
			$pArea = formatString($park['DogParkArea']);
			$pLat = $park['Latitude'];
			$pLng = $park['Longitude'];
		}
		
		$rating = $avg->fetch(PDO::FETCH_BOTH);
		$display_rating = round($rating[0], 1, PHP_ROUND_HALF_EVEN);
		if ($display_rating == 0){
			$display_rating = "No rating";
		} 
		
		echo "<h1>$pName</h1>";
		echo '<div class="parkInfo"><ul>';
		echo "<li>Dog Park Name: $pDPname</li>";
		echo "<li>Address: $pSt, $pSub</li>";
		echo "<li>Park Size: $pArea m&sup2</li>";
		echo "<li>Average Rating: $display_rating </li>";
		echo "</div>";
		
		echo "<div id='map'><script> 
			function initMap() {
			var myLatLng = {lat: $pLat, lng: $pLng};

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 12,
				center: myLatLng
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: 'Dog Park Location'
			});

			var markerLabel = '<b>$pName</b></br> $pSt, $pSub';

			var infowindow = new google.maps.InfoWindow({
				content: markerLabel
			});

			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			}
			</script>
			<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBvUsbUSmkyhKNo4CfPWXtA26ytz3Qr01s&callback=initMap' async defer></script></div>";
		
	}
	
	
	
?>
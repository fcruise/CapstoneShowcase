<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016 */

	include 'setup.inc';

	// Checks that search input fields are not empty
	function checkEmpty($field_list) {
		$filled = false; 
		if (!empty($field_list['parkName'])){
			$filled = true;
		}
		if (!empty($field_list['rating'])){
			$filled = true;
		}
		if (!empty($field_list['suburb'])){
			$filled = true;
		}
		return $filled;	
	}
	
	
	// Returns a SQL query depending on which criterias the user wants to search a park with
	function searchParks($field_list) {
		
		$search_fields = array('parkName', 'rating', 'suburb');
		$criteria = array();
		
		if(empty($field_list['rating'])){
			$search_query = "SELECT ParkName, Street, Suburb, ParkID, Latitude, Longitude FROM parks WHERE ";
		}
		else {
			$search_query = "SELECT ParkName, Street, Suburb, Rating, parks.ParkID, Latitude, Longitude FROM parks, reviews WHERE ";
		}
		
		foreach($search_fields as $field){
			if(!empty($field_list[$field]) && $field !== 'rating'){
				$criteria[] = "`$field` LIKE '%$field_list[$field]%'";
			}
			else if($field == 'rating' && !empty($field_list[$field])){
				$criteria[] = "rating >= $field_list[$field] AND parks.ParkID = reviews.ParkID";
			}
		}
		
		$search_query .= implode(' AND ', $criteria);
		return $search_query;
	}
	
	// Displays the list of parks returned from the search in a tabular format
	function displayParks($result) {
		echo '<div class="table"><table>';
		echo '<tr id="headings"><td>Park Name</td><td>Street Name</td><td>Suburb</td></tr>';
		
		// Loop here to generate dynamic table DISPLAYS ALL PARKS
		foreach ($result as $park){
			$pName = formatString($park['ParkName']);
			$pSt = formatString($park['Street']);
			$pSub = formatString($park['Suburb']);
			$pID = $park['ParkID'];
			echo "<tr>";
			echo "<td><a href='park.php?ParkID=$pID'>$pName</td>";
			echo "<td>$pSt</td>";
			echo "<td>$pSub</td>";
			echo "</tr>";
		}
		echo '</table></div>';
	}
	
	// Displays google map of the search results with pins on each park
	function displayMap($results){	
		$parkMarkers = array();
		$markersFormated = '';
		
		// Make an array for all parks for making individual markers in the map
		foreach ($results as $park){
			$name = formatString($park['ParkName']);
			$element = array('name'=>"$name", 'lat'=>$park['Latitude'], 'lng'=>$park['Longitude'], 'id'=>$park['ParkID']);
			$parkMarkers[] = $element;
		}
		
		// Loop through array to implement each marker on the map
		$i = 0;
		foreach($parkMarkers as $p){
			$lat = $p['lat'];
			$lng = $p['lng'];
			$id = $p['id'];
			$name = $p['name'];
			
			$markersFormated .= "
			var coords_$i = {lat: $lat, lng: $lng};
			var marker_$i = new google.maps.Marker({
			  map: map,
			  position: coords_$i,
			  title: '$name'
		    });
			
			var markerLabel_$i = '<a href=\"park.php?ParkID=$id\">$name</a>';
			
			var infowindow_$i = new google.maps.InfoWindow({
				content: markerLabel_$i
			});
			
			marker_$i.addListener('click', function() {
				infowindow_$i.open(map, marker_$i);
			});";
			$i++;
		}
		
		// Round off coordinates
		$la = round($parkMarkers[0]['lat'], 4, PHP_ROUND_HALF_UP);
		$lo = round($parkMarkers[0]['lng'], 4, PHP_ROUND_HALF_UP);
		
		// Echo the javascript coding for making the map
		echo "<script>
		function initMap() {
			var mycoords = {lat: $la, lng: $lo};
			var map = new google.maps.Map(document.getElementById('mapSearch'), {
			zoom: 12,
			center: mycoords
		});
		$markersFormated
		}</script>";
		
		echo "<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBvUsbUSmkyhKNo4CfPWXtA26ytz3Qr01s&callback=initMap' async defer></script>";
	}
	
	// Displays all the user search criterias on the search result page
	function displaySearchCriteria() {
		$mes_str = "<p class=\"searchCriteria\">Results for ";
	
		if (!empty($_POST['parkName'])){
			$mes_str .= "Park name: '$_POST[parkName]' | ";
		}
		if (!empty($_POST['rating'])){
			$mes_str .= "Rating: '$_POST[rating]/5' | ";
		}
		if (!empty($_POST['suburb'])){
			$mes_str .= "Suburb: '$_POST[suburb]' | ";
		}
		
		$mes_str .= "</p>";
		echo $mes_str;
	}
	
	// Displays user geolocation on the search result page
	function displayLocation(){
		$lat = round($_GET['lat'], 3, PHP_ROUND_HALF_EVEN);
		$lon = round($_GET['lon'], 3, PHP_ROUND_HALF_EVEN);
		$mes_str = "<p class=\"searchCriteria\">Results for parks near you within 3km ( Latitude: $lat | Longitude: $lon )";
		echo $mes_str;
	}
	
	// Converts a string into 'This Kind Of Format'
	function formatString($str){
		$str = strtolower($str);
		$str = ucwords($str);
		return $str;
	}	
?>
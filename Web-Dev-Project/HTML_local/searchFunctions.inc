<?php
	
	include 'setup.inc';
	

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
				$criteria[] = "rating >= $field_list[$field] AND parks.ParkID = reviews.ParkID;";
			}
		}
		
		$search_query .= implode(' AND ', $criteria);
		
		return $search_query;
	}
	
	
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
	
	function displayMap($results){
		
		$parkMarkers = array();
		$markersFormated = '';
		
		foreach ($results as $park){
			$name = formatString($park['ParkName']);
			$element = array('name'=>"$name", 'lat'=>$park['Latitude'], 'lng'=>$park['Longitude'], 'id'=>$park['ParkID']);
			$parkMarkers[] = $element;
		}
		
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
		$la = round($parkMarkers[0]['lat'], 4, PHP_ROUND_HALF_UP);
		$lo = round($parkMarkers[0]['lng'], 4, PHP_ROUND_HALF_UP);
		
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
	
		
		/* echo "</br>";
		echo count($parkMarkers);
		
		foreach($parkMarkers as $p){
			echo $p['name'];
			echo "</br>";
			echo $p['lat'];
			echo "</br>";
			echo $p['lng'];
			echo "</br>";
			echo $p['id'];
			echo "</br>";
		} */
		
	}
	
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
	
	function displayLocation(){
		$mes_str = "<p class=\"searchCriteria\">Results for parks near you ( Latitude: $_GET[lat] | Longitude: $_GET[lon] )";
		echo $mes_str;
	}
	
	function formatString($str){
		$str = strtolower($str);
		$str = ucwords($str);
		return $str;
	}
	
	
	
	
	
	
	
	
?>
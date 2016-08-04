<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016 */

	// This code is responsible for the logic of displaying search results and search inputs are validated
	
	include 'setup.inc';
	require 'searchFunctions.inc';
	
	// Checks that at least one search field is filled out
	if (checkEmpty($_POST)){
		
		// Search for parks with matching criteria
		$query = searchParks($_POST);
		$rowNum = $pdo->prepare($query);
		$rowNum->execute();
		
		// Checks that the results are not empty
		if ($rowNum->rowCount()==0){
			include 'searchResultsNull.inc';
		}
		else {
			$rowNum->closeCursor();
			$result = $pdo->query($query);
			$results = $result->fetchAll(PDO::FETCH_ASSOC);
			$result->closeCursor();
			$maps = $pdo->query($query);
			include 'searchResultsTrue.inc';
		}
	}
	else {
		// Display error message on Search page
		include 'searchForm.inc';
	}
?>
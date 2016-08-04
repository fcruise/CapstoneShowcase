<html>
<?php
	
	include 'setup.inc';
	
	require 'searchFunctions.inc';
	
	// Checks that at least one search field is filled out
	if (checkEmpty($_POST)){
		
		// Search for parks with matching criteria
		$query = searchParks($_POST);
		$rowNum = $pdo->prepare($query);
		$rowNum->execute();
		$results = $pdo->query($query);
		$maps = $pdo->query($query);
		
		// Checks that the results are not empty
		if ($rowNum->rowCount()==0){
			include 'searchResultsNull.inc';
		}
		else {
			include 'searchResultsTrue.inc';
			//echo $rowNum->rowCount();
			
		}
	}
	else {
	
		// Display error message on Search page
		include 'searchForm.inc';
	}


?>
</html>
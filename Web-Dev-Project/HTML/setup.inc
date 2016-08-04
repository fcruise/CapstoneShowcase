<?php
/* Authors: Lok Sum Lo (n9050159) */
/* CAB230 Wec Computing Assignment, May 2016 */

	// Connect to the fastapps04 database
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=n9050159', 'n9050159', 'n905015-');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$result = $pdo->query('SELECT ParkName, Street, Suburb FROM parks');
	}
	catch (PDOException $e){
		echo $e->getMessage();
	}
?>
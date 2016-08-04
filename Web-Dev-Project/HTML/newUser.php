<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

// This code creates a new row in the users table for registering a new user

	include 'setup.inc';
	include 'validateFunctions.inc';
	
	$errors = array();
	
	// After inputs are validated, data is inserted into the users table with a prepare statement
	if(validateRegistration($errors, $_POST, $pdo)){
		$stmt = $pdo->prepare('INSERT INTO users (Username, Email, DOB, Sex, Phone, Password, Salt) VALUES (:username, :email, :dob, :sex, :phone, sha2(CONCAT(:psw, :salt), 0), :salt)');

		$salt = uniqid();

		$stmt->bindValue(':username', $_POST['username']);
		$stmt->bindValue(':email', $_POST['email']);
		$stmt->bindValue(':dob', $_POST['dob']);
		$stmt->bindValue(':sex', $_POST['sex']);
		$stmt->bindValue(':phone', $_POST['phone']);
		$stmt->bindValue(':psw', $_POST['psw']);
		$stmt->bindValue(':salt', $salt);
		$stmt->execute();

		$welcome = true;
		
		// Displays registration successful message
		include 'index.inc';
	} 
	else {
		// Displays errors on registration form
		include 'registrationForm.inc';
	}

?>
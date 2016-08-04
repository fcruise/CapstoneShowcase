<?php

	include 'setup.inc';
	include 'validateFunctions.inc';
	
	$errors = array();
	
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

		include 'index.inc';
	} 
	else {
		include 'registrationForm.inc';
	}

?>
<?php
/* Authors: Lok Sum Lo (n9050159) */
/* CAB230 Wec Computing Assignment, April 2016 */

// Validates username and password inputs
function validateLogin(&$errors, $field_list){
	$validated = true;
	
	if(empty($field_list['username'])){
		$errors['username'] = 'Username cannot be empty.';
		$validated = false;
	}
	
	if(preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
	}
	else {
		$errors['username'] = 'Username invalid.';
		$validated = false;
	}

	if(empty($field_list['psw'])){
		$errors['psw'] = 'Password cannot be empty.';
		$validated = false;
	}
	
	if(preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{1,}$/", $_POST['psw'])){
	}
	
	else {
		$error['psw'] = 'Password invalid.';
		$validated = false;
	}
	return $validated;
}

// Validation function for registration page, makes sure there are no duplicate usernames/email addresses
function validateRegistration(&$errors, $field_list, $pdo){
	$validated = true;
	$username = $pdo->prepare('SELECT Username FROM users WHERE Username = :username');
	$username->bindValue(':username', $field_list['username']);
	$username->execute();

	$email = $pdo->prepare('SELECT Email FROM users WHERE Email = :email');
	$email->bindValue(':email', $field_list['email']);
	$email->execute();
	
	if ($username->rowCount() > 0){
		$validated = false;
		$errors['username'] = 'Username is taken.';
	}
	if ($email->rowCount() > 0){
		$validated = false;
		$errors['email'] = 'Email address is already registered.';
	}
	
	return $validated;
}

?>
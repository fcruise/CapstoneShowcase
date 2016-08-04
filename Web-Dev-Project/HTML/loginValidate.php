<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

	include 'setup.inc';
	include 'validateFunctions.inc';
	include 'loginFunctions.inc';
	
	// An array to store error fields and error messages
	$errors = array();

	// Checks to see that input formats are correct
	if (validateLogin($errors, $_POST)) {
		// Checks to see if user exists on database
		if(checkPassword($_POST['username'], $_POST['psw'], $pdo)){
			session_start();
			$userInfo = getUserInfo($_POST['username'], $_POST['psw'], $pdo);
			$_SESSION['isLoggedin'] = true;
			$_SESSION['userID'] = $userInfo[0];
			$_SESSION['username'] = $userInfo[1];
			header("Location: http://{$_SERVER['HTTP_HOST']}/n9050159/HTML/index.php");
		}
		else{
			// Display login fail error (no match for username and password)
			$errors['loginFail'] = 'Username and password do not match.';
			include 'loginForm.inc';
		}
	}
	else {
		// Display validation errors (incorrect input format)
		include 'loginForm.inc';
	}


	
?>

<?php
	include 'setup.inc';
	include 'validateFunctions.inc';
	include 'loginFunctions.inc';
	
	$errors = array();

	if (validateLogin($errors, $_POST)) {
		if(checkPassword($_POST['username'], $_POST['psw'], $pdo)){
			session_start();
			$userInfo = getUserInfo($_POST['username'], $_POST['psw'], $pdo);
			$_SESSION['isLoggedin'] = true;
			$_SESSION['userID'] = $userInfo[0];
			$_SESSION['username'] = $userInfo[1];
			header("Location: http://{$_SERVER['HTTP_HOST']}/Week7/HTML/index.php");
		}
	}
	else {
		// Display errors
		include 'loginForm.inc';
	}


	
?>

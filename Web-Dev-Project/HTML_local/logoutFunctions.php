<?php
	function logout(){
		session_start();
		unset($_SESSION['isLoggedin']);
		unset($_SESSION['username']);
		unset($_SESSION['userID']);
	}
?>
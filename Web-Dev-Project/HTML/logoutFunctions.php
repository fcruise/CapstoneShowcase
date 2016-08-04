<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

	// Logs out and unsets all session variables
	function logout(){
		session_start();
		unset($_SESSION['isLoggedin']);
		unset($_SESSION['username']);
		unset($_SESSION['userID']);
	}
?>
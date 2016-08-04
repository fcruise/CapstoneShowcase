<?php
/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016  */

	// Returns user information for session variables from the database if user logs in successfully
	function getUserInfo($username, $password, $pdo){
		$stmt = $pdo->prepare('SELECT UserID, Username FROM users WHERE Username = :username and Password = SHA2(CONCAT(:password, Salt), 0)' );
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':password', $password);
		$stmt->execute();
		
		if ($stmt->rowCount() > 0){
			$id = $stmt->fetch(PDO::FETCH_BOTH);
			return $id; 
		} 
	}
	
	// Checks whether the user login inputs are valid against the database; returns true if successful, false if not
	function checkPassword($username, $password, $pdo){
		$stmt = $pdo->prepare('SELECT * FROM users WHERE Username = :username and Password = SHA2(CONCAT(:password, Salt), 0)' );
		$stmt->bindValue(':username', $username);
		$stmt->bindValue(':password', $password);
		$stmt->execute();
		
		if ($stmt->rowCount() > 0){
			return true;
		} else {
			return false;
		}
	}

	// Displays welcome message on index page if user is logged in
	function welcomeMessage(){
		if(isset($_SESSION['isLoggedin'])){
			$name = $_SESSION['username'];
			echo "<h2>Welcome, $name!</h2>";
		}
}
?>
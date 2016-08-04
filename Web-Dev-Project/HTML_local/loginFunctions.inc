<?php
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

function welcomeMessage(){
	if(isset($_SESSION['isLoggedin'])){
		$name = $_SESSION['username'];
		echo "<h2>Welcome, $name!</h2>";
	}
}
?>
<?php
if(isset($_POST['submit'])){
  $mysqli = NEW mysqli("localhost:3306","root","password123","wifi");

// // *script for checking connection to MySQL database*//
// if ($conn->connect_error) {
//   die("Connection failed:" .$conn->connect_error);
//
// }
//
// echo "Connected successfully";

  $search = $mysqli ->real_escape_string($_POST['search']);

  $resultSet - $mysqli ->query("SELECT * FROM wifi-hot-spots-win WHERE suburb - '$search' ")

//   if($resultSet->num_rows > 0){
//
//   }else {
//     echo "No Results";
// }
?>

<h1> Search </h1>
<form method="POST">
  <input type="TEXT" name="search" />
  <input type="SUBMIT" name = "submit" value = "Search" />
</form>

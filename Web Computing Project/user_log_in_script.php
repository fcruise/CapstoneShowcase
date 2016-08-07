<?php
//include functions
session_start();
//include header
include('');
//include footer
include('');
//include login form
include('');

?>

<?php

//make connection to db
include('project_connect_db.inc');

//target the log in buttom that is named "submit" in log in form
 
			if (isset($_POST['submit']))
			{
				$email= $_POST['email'];
				$pass_word= $_POST['pass_word'];

				try
				{
					//make query to look for the email and password inside the db
					$result = $pdo->prepare('SELECT * FROM members where email=$email AND pass_word=$pass_word');
					
				}
				catch (PDOException $e)
				{
					echo $e->getMessage();
				}					
			}

			if ($result==1){
				
			$_SESSION['email']=$email;
			echo '<script>window.open(log_in.php)</script>';
			}
			else
			{
				echo '<script>alert()</script>';
			}
?>
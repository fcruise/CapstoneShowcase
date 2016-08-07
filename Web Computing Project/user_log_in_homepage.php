<?php
session_start();
//include home template and login form
include('include/sectionB7.php');
include('include/sectionB5.php');

//make connection to db
include('include/project_connect_db.inc');

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
			echo 'Congratulations';
			}
			else
			{
				echo 'Ooooops, email or password is invalid!';
			}
?>

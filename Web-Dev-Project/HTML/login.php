<!--  Authors: Lok Sum Lo (n9050159) -->
<!--  CAB230 Wec Computing Assignment, April 2016 -->


<!DOCTYPE html>
<html>
	<head>
		<title>Log in - Dog Park Searcher</title>
		<meta charset="UTF-8"> 
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="scripts.js"></script>
	</head>
	
	<!-- This page allows users to login with a form consisting Username and Passowrd input fields -->
	
	<body>
		<div class="container">
			
			<?php include 'menu.inc' ?>
			<?php include 'setup.inc'?>
			
			<div class="wrapper">
				<div class="content">
					<form name="login" id="login" action="loginValidate.php" method="post">
						<fieldset>
							<legend>LOG IN</legend></br>
							<ul>
								<li>Username:</li><input type="text" name="username" pattern="^[a-zA-Z0-9_-]*$" required></br></br>
								<li>Password:</li><input type="password" name="psw" id="psw" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{1,}$" required></br></br>
							</ul>
							<input type="submit" class="submitButton" value="LOG IN" id="submitLogin">
						</fieldset>
					</form>
				</div> <!-- content -->
			</div> <!-- wrapper -->
		 </div> <!-- container -->
		 
		 <div class="footer">
			<a>About</a>
			<a>Contact us</a>
		 </div> <!-- footer -->
	</body>
	
</html>
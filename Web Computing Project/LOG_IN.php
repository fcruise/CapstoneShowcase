<html>
<head>
		<title>LOG_IN</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
		<?php
		require("menu.inc");
			require('user_log_in_script.php');
			?>
</head>
<body>
	<div id="info">



		<div>
			<h2>Are You Interested? <a href="http://localhost/week7/Project/project_sign_up.php">Sign up</a><h2>
			<h2> Are You a Member? <a href="http://localhost/week7/Project/LOG_IN">Sign In</a></h2>
			<h2><input type="email" value="" required="required" placeholder="Email" name="email" id="email"><h2>
			<h2><input type="password" value="" required="required" placeholder="Password" name="password" id="password"><h2>
			<button  value="submit" type="submit"><span>Log In</span></button></br>

		</div>
		<div>
		</div>

	</div>


	<div id="sidebar_right">
		<img src="p_images/brisbane-sign-night.jpg"/>
	</div>

	<div id="footer">
			<h1>Free WiFi Hotspot</h1>
	</div>
</div>
</div>
</body>
</html>

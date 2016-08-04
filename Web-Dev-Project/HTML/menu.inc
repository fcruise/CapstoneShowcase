<!-- Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, April 2016  -->

<!-- This is the menu bar for site navigation and is included in every page -->

<div class="header-cont">
	<div class="header">
		<h1>DOG PARK SEARCHER</h1>
		<div class="nav" id="navMenu">
			<a href="index.php">Home</a>
			<a href="search.php">Search</a>
			
			<!-- Display 'Register' and 'Login' buttons if user is not logged in, otherwise display 'Logout' button -->
			<?php 
				if(!session_id()){
					session_start();
				}
				
				if(isset($_SESSION['isLoggedin'])){
					echo '<a href="logout.php">Log out</a>';
				}
				else {
					echo '<a href="registration.php">Register</a>';
					echo '<a href="login.php">Log in</a>';
				}
			?>
		</div> <!-- nav -->
	</div> <!-- header -->
</div> <!-- header-cont -->
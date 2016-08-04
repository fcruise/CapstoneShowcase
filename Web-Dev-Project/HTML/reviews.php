<?php
/* Authors: Lok Sum Lo (n9050159), Thiline Widanagamage (n9185691) 
CAB230 Wec Computing Assignment, May 2016 */

	// Checks to see if user is logged in to determine whether to display the review inuput field

	include 'setup.inc';

	function loggedIn() {
		if(isset($_SESSION['isLoggedin'])){
			echo "<h2>Leave a Review</h2>
				  <form id=\"inputReview\" action =\"addReviews.php\" method =\"post\">
						<textarea id=\"reviewinput\" name =\"reviewinput\" placeholder=\"Leave a Review\" rows=\"10\" cols =\"115\" required></textarea>
						<ul>
							<li>Rating:
							<select name =\"Rating\" required>
								<option disabled selected value>Rate this Park</option>
								<option value=1>1/5</option>
								<option value=2>2/5</option>
								<option value=3>3/5</option>
								<option value=4>4/5</option>
								<option value=5>5/5</option>
							</select></li>
						</ul>
						
						<input type=\"hidden\" name=\"parkID\" value=\"$_GET[ParkID]\">
						<input type=\"hidden\" name=\"username\" value=\"$_SESSION[username]\">
						<input type=\"submit\" class=\"submitButton\" value=\"Submit Review\" id=\"submitComment\" style=\"text-decoration:none;top:30px;\">
					</form>";

		}
		else {
			echo "<h2>Log in to Leave a Review</h2>";
		}
	}


?>
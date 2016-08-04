/* Authors: Lok Sum Lo (n9050159) 
CAB230 Wec Computing Assignment, May 2016 */


// Gets the geolocation of user in coordinates
function getLocation() {
 	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition); 
	} 
	else {
		window.alert("Geolocation is not supported in this browser.");
	} 
}

// For testing that geolocation works
function showPosition(position) {
	window.location.href = "location.php?lat=" + position.coords.latitude + "&lon=" + position.coords.longitude;
}


// For debugging purposes
function showError(error) { 
	window.alert(error);
}

// Validates that the 'password' field matches the 'confirm password' field on the registration page
function validate () {
	var validated = true;
	if (checkPassword()) {
		document.forms["registration"]["cpsw"].setCustomValidity("Passwords must match.");
		document.forms["registration"]["cpsw"].style.backgroundColor = "#ff9999";
		document.forms["registration"]["cpsw"].focus();
		validated = false;
	}
	return validated;
}

// Function to compare the 'password' field and the 'confirm password' field
function checkPassword() {
	var p = document.forms["registration"]["psw"].value;
	var p2 = document.forms["registration"]["cpsw"].value;
	
	if (p == null || p == "" || p2 == null || p2 == "") {
		return true;
	}
	else if (p  !== p2) {
		return true;
	}
	else {
		return false;
	}
}

// Function to hide error
function hideError() {
	document.forms["registration"]["cpsw"].style.backgroundColor = "white";
}



/* Functions related to resizable screens for mobile devices (scrpped after reading that we don't have to implement mobile screens)

function showMenu() {
	//window.alert("working");
	document.getElementById("navMenu").style.display = "inline-block";
}

function hideMenu() {
	document.getElementById("navMenu").style.display = "none";
}

function defaultMenu() {
	window.alert("ok");
} */

/* function validate () {
	
	var validated = true;
	
	if (checkName()) {
		//window.alert("Missing surname");
		document.getElementById("surnameMissing").style.visibility = "visible";
		document.getElementById("surname").focus();
		validated = false;
	}
	
	if (checkPassword()) {
		window.alert("Please make sure that the passwords match");
		validated = false;
	}
	
	if (validated) {
		window.alert("Form validated!");
	}
	
	return validated;
	
}

function checkName() {
	var x = document.forms["myform"]["surname"].value;
	if (x == null || x == "") {
		return true;
	}
	else {
		return false;
	}
}

function hideError() {
	document.getElementById("surnameMissing").style.visibility = "hidden";
}

function checkPassword() {
	var p = document.forms["myform"]["psw"].value;
	var p2 = document.forms["myform"]["conpsw"].value;
	
	if (p == null || p == "" || p2 == null || p2 == "") {
		return true;
	}
	else if (p  !== p2) {
		return true;
	}
	else {
		return false;
	}
} */
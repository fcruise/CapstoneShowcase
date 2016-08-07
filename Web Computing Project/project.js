function validate() {
if (!checkName() || !checkPassword() || !checkAddress()){
	return false;
}
else {
	return true;
}

}
function checkName() {
	var x = document.forms["form1"]["surname"].value;
	if (x == null || x == "") {
		document.getElementById("surnameMissing").style.visibility = "visible";
		document.getElementById("name").focus();
		return false;
	}
	else{
		return true;
	}
}

function checkAddress() {
	var x = document.forms["form1"]["streetadd"].value;
	if (x == null || x == "") {
		document.getElementById("addMissing").style.visibility = "visible";
		document.getElementById("name").focus();
		return false;
	}
	else{
		return true;
	}
}
function CName(){
	document.getElementById("surnameMissing").style.visibility = "hidden";
}

function checkPassword() {
	var x = document.forms["form1"]["pass_word"].value;
	var y = document.forms["form1"]["confirm"].value;
	if (x != y) {
		document.getElementById("noMatch").style.visibility = "visible";
		return false;
	}
	else{
		return true;

	}
}

function CPass() {
	document.getElementById("noMatch").style.visibility = "hidden";
}

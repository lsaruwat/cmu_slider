$(document).ready(function() {
	$("#login_form").on("submit", submitForm);

});



function submitForm(e){
	e.preventDefault(); // prevent the default action

	var username = $("#username").val(); // get password from form
	var password = $("#password").val(); // get password from form
	
	console.log("Form submitted");
	
	$.ajax({
		url : "login_check.php",
		dataType : 'json',
		type : 'POST',
		data : {
			username : username,
			password : password,
		},
		success : function (data) {
			console.log("Username: " + data.username);
			console.log("Password: " + data.password);

		}

	});
}
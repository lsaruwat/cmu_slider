$(document).ready(function() {
	$("#login_form").on("submit", submitForm);

});



function submitForm(e){
	e.preventDefault();

	var username = $("#username").val();
	var password = $("#password").val();
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
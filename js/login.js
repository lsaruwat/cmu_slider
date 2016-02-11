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
		success : function (returnData) {
			if(returnData.message == "Success"){
				window.location = "home.php";
				console.log(returnData.message);
			}
			else {
				$("#login_error").html("<p>"+ returnData.message + "</p>");
				console.log(returnData.message);
			}

		}

	});
}
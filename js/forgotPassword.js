$(document).ready(function() {
	$("#forgot_pass_form").on("submit", submitForm);

});



function submitForm(e){
	e.preventDefault(); // prevent the default action

	var formData = $("#forgot_pass_form").serialize();
	console.log("Form submitted");
	console.log(formData);
	
	$.ajax({
		url : "forgotPassCheck.php",
		dataType : 'json',
		type : 'POST',
		data : {
			data : formData,
		},
		success : function (returnData) {
			if(returnData.message == "Password updated successfully"){
				$("#feedback_message").html("<p>Password changed successfully</p>");
				
				window.setTimeout(function(){
					window.location = "login_page.php";
				}, 1000);
			}
			else {
				$("#feedback_message").html("<p>"+ returnData.message + "</p>");
				console.log(returnData.message);
			}

		}

	});
}

$(document).ready(function() {
	$("#register_form").on("submit", submitForm);

});



function submitForm(e){
	e.preventDefault(); // prevent the default action

	var formData = $("#register_form").serialize();
	console.log("Form submitted");
	console.log(formData);

	$.ajax({
		url : "register_check.php",
		dataType : 'json',
		type : 'POST',
		data : {
			data : formData,
		},
		success : function (returnData) {
			console.log(returnData);
			if(returnData.status == "inserted"){
				window.location="login_page.php";
			}

			else {
				console.log(returnData.status);
				$("#feedback_message").html("<p>"+returnData.errorMessage+"</p>");
			}
		}

	});
}
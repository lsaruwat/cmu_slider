$(document).ready(function() {
	console.log("LOADED");
	$("#create_key").on("submit", submitForm);
});



function submitForm(e){
	e.preventDefault(); // prevent the default action

	var formData = $(this).serialize();
	console.log("Form submitted");
	
	$.ajax({
		url : "saveKeyCheck.php",
		dataType : 'json',
		type : 'POST',
		data : {
			data : formData,
		},
		success : function (returnData) {
			if(returnData.message == "Success"){
				$("#response_message").html(returnData.feedback);
				
				//window.setTimeout(function(){window.location = "login_page.php";}, 1000);

			}
			else {
				$("#response_message").html("<p>"+ returnData.feedback + "</p>");
				console.log(returnData);
			}

		}

	});
}

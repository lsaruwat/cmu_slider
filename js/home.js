
$(document).ready(function() {
	CKEDITOR.replace('slide_content'); // replace textarea with nice editor
	$("#preview_button").on("click", renderPreview);
	$("#slide_options .button").on("click", selectSlideType);
	$("#slide_form").on("submit",submitBasic);
});


function renderPreview(){

	var title = $("#slide_title").val();
	var content = CKEDITOR.instances['slide_content'].getData();	
	var contentContainer = $("#content_container");
	var slidePreview = $("#slide_preview");
	var height = window.innerHeight;

	slidePreview.attr("style", "display: inline-block; height:" + height + "px;");
	contentContainer.html("<h1 class='title_preview'>" + title + "</h1>");
	contentContainer.append("<p class='content_preview'>" + content + "</p>");

	$('html, body').animate({
    	scrollTop: slidePreview.offset().top
	}, 800);//this seems gross but this is how you scroll to an element
}


function selectSlideType(e){

	var selectedButtons = $("#slide_options .selected");
	var button = $(e.target);

	selectedButtons.removeClass("selected"); //disable previous selected button
	button.addClass("selected");

	if(button.val() === "Text Slide"){
		$("#slide_form .row.optional.picture").attr("class", "row optional picture");
		$("#slide_form .row.optional.url").attr("class","row optional url");
		$("#slide_form").off("submit");
		$("#slide_form").on("submit",submitBasic);
		// show only title and content inputs
	}

	else if(button.val() === "Picture Slide"){
		// show title, upload picture, and content inputs
		$("#slide_form .row.optional.picture").addClass("activated");
		$("#slide_form .row.optional.url").attr("class","row optional url");
		$("#slide_form").off("submit");
		$("#slide_form").on("submit",function(e){
			e.preventDefault();
			var formData = $("#slide_form").serialize();
			console.log("Picture slide submitted");
		});
	}

	else if(button.val() === "Web Slide"){
		// show title, content, and url inputs
		$("#slide_form .row.optional.url").addClass("activated");
		$("#slide_form .row.optional.picture").attr("class", "row optional picture");
		$("#slide_form").off("submit");
		$("#slide_form").on("submit",function(e){
			e.preventDefault();
			var formData = $("#slide_form").serialize();
			console.log("Web Slide submitted");
		});
	}

}

function handleFormSubmit(e){
	e.preventDefault();

	var formData = $("#slide_form").serialize();
	console.log("Form submitted");
	console.log(formData);
}


function submitBasic(e){
	e.preventDefault();
	var slideData = { 
		title : $("#slide_title").val(),
		content : CKEDITOR.instances['slide_content'].getData(),
		templateId : 1
	};

	console.log(slideData);

	$.ajax({
	url : "insertSlide.php",
	dataType : 'json',
	type : 'POST',
	data : {
		slideData
	},

	success : function (returnData) {
		if(returnData.message == "Success"){
			//window.location = "home.php";
			console.log(returnData.message);
		}
		else {
			$("#login_error").html("<p>"+ returnData.message + "</p>");
			console.log(returnData.message);
		}

	}

});
}
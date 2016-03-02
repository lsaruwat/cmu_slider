
$(document).ready(function() {
	CKEDITOR.replace('slide_content'); // replace textarea with nice editor
	$("#preview_button").on("click", renderPreview);
	$("#slide_options .button").on("click", selectSlideType)
});


function renderPreview(){

	var title = $("#slide_title").val();
	var content = CKEDITOR.instances['slide_content'].getData();	
	var contentContainer = $("#content_container");
	var slidePreview = $("#slide_preview");
	var height = window.innerHeight;

	console.log(title);
	console.log(content);

	slidePreview.attr("style", "display: inline-block; height:" + height + "px;");
	contentContainer.html("<h1 class='title_preview'>" + title + "</h1>");
	contentContainer.append("<p class='content_preview'>" + content + "</p>");
}


function selectSlideType(e){

	var selectedButtons = $("#slide_options .selected");
	var button = $(e.target);

	selectedButtons.removeClass("selected"); //disable previous selected button
	button.addClass("selected");

	if(button.val() === "Text Slide"){
		
		// show only title and content inputs
	}

	else if(button.val() === "Picture Slide"){
		// show title, upload picture, and content inputs
	}

	else if(button.val() === "Web Slide"){
		// show title, content, and url inputs
	}

}
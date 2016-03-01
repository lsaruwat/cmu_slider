
$(document).ready(function() {
	CKEDITOR.replace('slide_content'); // replace textarea with nice editor
	$("#preview_button").on("click", renderPreview);
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

$(document).ready(function() {
	CKEDITOR.replace('slide_content'); // replace textarea with nice editor
	$("#preview_button").on("click", renderPreview);
});


function renderPreview(){

	var title = $("#slide_title").val();
	var content = CKEDITOR.instances['slide_content'].getData();	
	var previewArea = $("#slide_preview");

	console.log(title);
	console.log(content);

	previewArea.html("<h1 class='title_preview'>" + title + "</h1>");
	previewArea.append("<p class='content_preview'>" + content + "</p>");
}
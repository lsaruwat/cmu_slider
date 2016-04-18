
$(document).ready(function() {
	CKEDITOR.replace('slide_content'); // replace textarea with nice editor
	$("#preview_button").on("click", renderPreview);
	$("#slide_options .button").on("click", selectSlideType);
	$("#slide_form").on("submit",submitSlide);
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
		$("#slide_form").on("submit",submitSlide);
		// show only title and content inputs
	}

	else if(button.val() === "Picture Slide"){
		// show title, upload picture, and content inputs
		$("#slide_form .row.optional.picture").addClass("activated");
		$("#slide_form .row.optional.url").attr("class","row optional url");
		$("#slide_form").off("submit");
		$("#slide_form").on("submit",submitSlide);
	}

	else if(button.val() === "Web Slide"){
		// show title, content, and url inputs
		$("#slide_form .row.optional.url").addClass("activated");
		$("#slide_form .row.optional.picture").attr("class", "row optional picture");
		$("#slide_form").off("submit");
		$("#slide_form").on("submit",submitSlide);
	}

}

function handleFormSubmit(e){
	e.preventDefault();

	var formData = $("#slide_form").serialize();
	console.log("Form submitted");
	console.log(formData);
}


function submitSlide(e){
	e.preventDefault();

	var slideData = new FormData();

	//Append files infos
	 jQuery.each($("#slide_picture")[0].files, function(i, file) {
	     slideData.append('file-'+i, file);
	 });


	slideData.append("title", $("#slide_title").val() );
	slideData.append("content", CKEDITOR.instances['slide_content'].getData() );
	// slideData.append("image", $("#slide_image").val() );
	slideData.append("url", $("#slide_url").val() );


	console.log(slideData);

	$.ajax({
	url : "insertSlide.php",
	dataType : 'json',
	type : 'POST',
	processData : false,
	cache : false,
	contentType : false,
	data : slideData,

	success : function (returnData) {
		if(returnData.message == "Success"){
			//setTimeout(function(){location.reload();},1000);
			$("#response_message").html( "<p>" + returnData.feedback + "</p>");
			$("#slide_form")[0].reset();

			//this resets the wysiwig editors content as well
			for ( instance in CKEDITOR.instances ){
		        CKEDITOR.instances[instance].updateElement();
		        CKEDITOR.instances[instance].setData('');
		    }
		}
		else {
			$("#response_message").html("<span class='error'><p>"+ returnData.feedback + "</p></span>");
		}

	}

});
}
window.addEventListener("load", addListener, false);

function addListener(){
	$("form").on("submit", updateSlideById);
}

function deleteSlideById(e, id){
	console.log(id);
	var row = $(e.target).parent().parent(); //parentception
	$.ajax({
		url : "deleteSlide.php",
		dataType : 'json',
		type : 'POST',
		data : {
			id : id
		},
		row : row,

		success : function (returnData) {
			if(returnData.message == "Success"){
				setTimeout(function(){location.reload();},1000);
				this.row.append( "<p class='response_message'>" + returnData.feedback + "</p>");
			}
			else {
				this.row.append( "<p class='response_message error'>" + returnData.feedback + "</p>");
			}

		}

	});
}

function updateSlideById(e){
	e.preventDefault();
	
	var formData = $(this).serialize();
	console.log(formData);
	var thing = $(this);
	$.ajax({
		url : "updateSlide.php",
		dataType : 'json',
		type : 'POST',
		data : formData,
		row : $(this),

		success : function (returnData, thing) {
			if(returnData.message == "Success"){
				setTimeout(function(){location.reload();},1000);
				this.row.append( "<p class='response_message'>" + returnData.feedback + "</p>");
			}
			else {
				this.row.append( "<p class='response_message error'>" + returnData.feedback + "</p>");
			}

		}

	});
}
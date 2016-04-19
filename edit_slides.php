<?php
session_start();
include("db/connect.php");

$pageTitle = "edit slides";
include("header.php");
if($_SESSION['permissions'] === "admin"){
?>

<div class="row table-titles">
	<div class='one columns' style='text-align: right;'><h3>Id</h3></div>
	<div class='one columns'><h3>Delete</h3></div>
	<div class='two columns'><h3>Title</h3></div>
	<div class='two columns'><h3>Content</h3></div>
	<div class='one columns'><h3>Update</h3></div>
	<div class='five columns'><h3>Image/Url</h3></div>
</div>
<?php

	$sql = "SELECT * FROM slide ORDER BY id";
	$psql = $conn->prepare($sql);
	$psql->execute();
	$rows = $psql->fetchAll();

	foreach($rows as $row){
		echo "<form method='POST' id='slide_" . $row['id'] . "'><div class='edit-slide row'><div class='one columns' style='text-align: right;'>" . $row['id'] . 
		"</div><div class='one columns'><input type='hidden' name='id' value='" . $row['id'] . "'/><input type='button' onclick='deleteSlideById(" . $row['id'] . ")' value='Delete'/></div>
		<div class='two columns'><input type='text' name='title' value='" . $row['title'] . "' /></div><div class='two columns'><textarea name='content' rows='20' cols='20'>" . $row['content'] . "</textarea></div>
		<div class='one columns'><input type='submit' class='slide_form' value='Update'/></div>
		<div class='two columns'> " . $row['image'] . "</div><div class='three columns'> " . $row['url'] .
		 "</div></div></form>";
	}
include("footer.php");
?>

<script type="text/javascript">
window.addEventListener("load", addListener, false);

function addListener(){
	$("form").on("submit", updateSlideById);
}

function deleteSlideById(id){
	console.log(id);
	$.ajax({
		url : "deleteSlide.php",
		dataType : 'json',
		type : 'POST',
		data : {
			id : id
		},

		success : function (returnData) {
			if(returnData.message == "Success"){
				//setTimeout(function(){location.reload();},1000);

				$("#response_message").html( "<p>" + returnData.feedback + "</p>");
			}
			else {
				$("#response_message").html( "<p>" + returnData.feedback + "</p>");
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
				this.row.append( "<p class='response_message'>" + returnData.feedback + "</p>");
			}
			else {
				this.row.append( "<p class='response_message error'>" + returnData.feedback + "</p>");
			}

		}

	});
}
</script>

<?php

}
//endif

else {
	$loginURL = "login_page.php";
	echo "Please <a href='$loginURL'>login</a> to continue";

}
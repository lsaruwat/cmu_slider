<?php
session_start();
include("db/connect.php");

$pageTitle = "edit slides";
include("header.php");

?>

<div class="container">
<div class="row table-titles">
	<div class='one columns'><h3>Id</h3></div>
	<div class='two columns'><h3>Delete</h3></div>
	<div class='two columns'><h3>Title</h3></div>
	<div class='two columns'><h3>Content</h3></div>
	<div class='five columns'><h3>Image/Url</h3></div>
</div>
<?php

if($_SESSION['permissions'] === 'admin'){


	$sql = "SELECT * FROM slide ORDER BY id";
	$psql = $conn->prepare($sql);
	$psql->execute();
	$rows = $psql->fetchAll();

	foreach($rows as $row){
		echo "<div class='edit-slide row'><div class='one columns'>" . $row['id'] . "</div><div class='two columns'><input type='button' id='' onclick='deleteSlideById(" . $row['id'] . ")' value='Delete'/></div><div class='two columns'> " . $row['title'] . "</div><div class='two columns'> " . $row['content'] . "</div><div class='two columns'> " . $row['image'] . "</div><div class='three columns'> " . $row['url'] . "</div></div>";
	}
include("footer.php");
?>

</div>
<script type="text/javascript">

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
				console.log(returnData.message);
				console.log(returnData);
			}
			else {
				$("#login_error").html("<p>"+ returnData.message + "</p>");
				console.log(returnData.message);
				console.log(returnData);
			}

		}

	});
}
</script>

<?php

}
//endif
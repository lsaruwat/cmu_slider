<?php
session_start();
include("db/connect.php");

$pageTitle = "edit slides";
include("header.php");

?>

<div class="container">
<?php

if($_SESSION['permissions'] === 'admin'){


	$sql = "SELECT * FROM slide ORDER BY id";
	$psql = $conn->prepare($sql);
	$psql->execute();
	$rows = $psql->fetchAll();

	foreach($rows as $row){
		echo "<div class='edit-slide row'><div class='one columns'>" . $row['id'] . "</div><div class='three columns'><input type='button' id='' onclick='deleteSlideById(" . $row['id'] . ")' value='Delete'/></div><div class='two columns'> " . $row['title'] . "</div><div class='two columns'> " . $row['content'] . "</div><div class='two columns'> " . $row['image'] . "</div><div class='two columns'> " . $row['url'] . "</div></div>";
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
				setTimeout(function(){location.reload();},1000);
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
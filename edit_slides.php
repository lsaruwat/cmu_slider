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
		"</div><div class='one columns'><input type='hidden' name='id' value='" . $row['id'] . "'/><input type='button' onclick='deleteSlideById(event," . $row['id'] . ")' value='Delete'/></div>
		<div class='two columns'><input type='text' name='title' value='" . $row['title'] . "' /></div><div class='two columns'><textarea name='content' rows='20' cols='20'>" . $row['content'] . "</textarea></div>
		<div class='one columns'><input type='submit' class='slide_form' value='Update'/></div>
		<div class='two columns'> " . $row['image'] . "</div><div class='three columns'> " . $row['url'] .
		 "</div></div></form>";
	}
include("footer.php");

}
//endif

else {
	$loginURL = "login_page.php";
	echo "Please <a href='$loginURL'>login</a> to continue";

}

?>
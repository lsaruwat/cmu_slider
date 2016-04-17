<?php

include("functions.php");
include("db/connect.php");

$title = $_POST['title'];
$content = $_POST['content'];
$url = $_POST['url'];

$target_file = "";
$message = "Failed to insert slide";
if($_FILES["file-0"]["name"] != ""){
	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["file-0"]["name"]);
}

if(file_exists($target_file))$message = "File already exists";
else {
	move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file);
	$sql = "INSERT INTO slide (title, content, image, url) VALUES (:title, :content, :image, :url)";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":title"=>$title, ":content"=>$content,  ":image"=>$target_file,  ":url"=>$url));
	$message = "Success";
}

echo json_encode(array("message"=>$message,"fileName"=>$target_file, "formdata"=>$_POST, "files"=>$_FILES["file-0"]));
?>


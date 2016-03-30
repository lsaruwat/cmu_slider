<?php

include("functions.php");
include("db/connect.php");

$title = $_POST['slideData']['title'];
$content = $_POST['slideData']['content'];
$image = $_POST['slideData']['image'];
$url = $_POST['slideData']['url'];
//$templateId = $_POST['slideData']['templateId'];

$sql = "INSERT INTO slide (title, content, image, url) VALUES (:title, :content, :image, :url)";
$psql = $conn->prepare($sql);
$query = $psql->execute(array(":title"=>$title, ":content"=>$content,  ":image"=>$image,  ":url"=>$url));

$message = "FAILED";

if($query != false){
	$message = "Success";
}

echo json_encode(array("title"=>$title, "content"=>$content, "message"=>$message));
?>

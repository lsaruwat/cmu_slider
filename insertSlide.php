<?php

include("functions.php");
include("db/connect.php");

$title = $_POST['slideData']['title'];
$content = $_POST['slideData']['content'];
$content = $_POST['slideData']['templateId'];

$sql = "INSERT INTO TemplateText (templateid, title, text) VALUES (:templateId, :title, :content)";
$psql = $conn->prepare($sql);
$psql->execute(array(":templateId"=>$templateId, ":title"=>$title, ":content"=>$content));
$row = $psql->fetch();


$message = "FAILED";

if($row != false){
	$message = "Success";
}

echo json_encode(array("title"=>$title, "content"=>$content, "message"=>$message));
?>

<?php

include("functions.php");
include("db/connect.php");

$title = $_POST['title'];
$content = $_POST['content'];
$url = $_POST['url'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

$target_file = "";
$feedback = "Failed to insert slide";
if($_FILES["file-0"]["name"] != ""){
	$target_dir = "img/";
	$target_file = $target_dir . basename($_FILES["file-0"]["name"]);
}

if(file_exists($target_file))$feedback = "File already exists";
else {
	move_uploaded_file($_FILES["file-0"]["tmp_name"], $target_file);
	$sql = "INSERT INTO slide (title, content, image, url, startDate, endDate, enabled) VALUES (:title, :content, :image, :url, :startDate, :endDate, true)";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":title"=>$title, ":content"=>$content,  ":image"=>$target_file,  ":url"=>$url, ":startDate"=>$startDate, ":endDate"=>$endDate));
	$message = "Success";
	$feedback = "Successfully inserted slide";
	
	//Log this action
	$sql = "SELECT id FROM slide WHERE title=:title";
	$psql = $conn->prepare($sql);
	$psql->execute(":title"=>$title);
	
	$slideid = $psql->fetchColumn(0);
	$username = $_SESSION['username'];
	$type = "insert";
	
	$sql = "INSERT INTO transactions (slideid, username, type) VALUES (:slideid, :username, :type)";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":slideid"=>$slideid, ":username"=>$username, ":type"=>$type));
}

echo json_encode(array("message"=>$message, "feedback"=>$feedback, "fileName"=>$target_file, "formdata"=>$_POST, "files"=>$_FILES["file-0"]));

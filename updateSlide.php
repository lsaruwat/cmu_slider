<?php
session_start();
include("functions.php");
include("db/connect.php");

$id = (int)$_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
(int)$enabled = $_POST['enabled'];


$message = "Failed";
$feedback = "Failed to update slide!";

if($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] === "superuser"){

	$sql = "UPDATE slide SET title=:title, content=:content, startDate=:startDate, endDate=:endDate, enabled=:enabled WHERE id=:id";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":id"=>$id, ":title"=>$title, ":content"=>$content, ":startDate"=>$startDate, ":endDate"=>$endDate, ":enabled"=>$enabled ));
	
	$message = "Success";
	$feedback = "Successfully updated slide " . $id;
}

echo json_encode(array("message"=>$message, "feedback"=>$feedback));
?>


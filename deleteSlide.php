<?php
session_start();
include("functions.php");
include("db/connect.php");

$id = (int)$_POST['id'];
$data = $_POST['data'];
$message = "Failed";
$feedback = "Failed to delete slide" . $id;

if($_SESSION['permissions'] == 'admin'){

	$sql = "SELECT image FROM slide WHERE id=:id";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":id"=>$id));
	$result = $psql->fetch();
	
	$imagePath = $result[0];
	if($imagePath != "")unlink($imagePath); //delete the image if it is there
	
	//now remove the db entry
	$sql = "DELETE FROM slide WHERE id=:id";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":id"=>$id));
	$message = "Success";
	$feedback = "Successfully deleted slide " . $id;
}

echo json_encode(array("message"=>$message,"imgQuery"=>$imagePath, "feedback"=>$feedback));
?>


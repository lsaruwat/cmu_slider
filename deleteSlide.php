<?php
session_start();
include("functions.php");
include("db/connect.php");

$id = (int)$_POST['id'];
//$data = $_POST['data'];
$message = "Failed";
$feedback = "Failed to delete slide" . $id;

if($_SESSION['permissions'] == 'admin' || $_SESSION['permissions'] == 'superuser'){

	$sql = "SELECT title FROM slide WHERE id=:id";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":id"=>$id));
	$result = $psql->fetch();
	$slidename = $result[0];

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
	
	//log this action
	if($query) {
		$username = $_SESSION['username'];
		$type = "delete";
		
		$sql = "INSERT INTO transactions (slideid, slidename, username, type) VALUES (:slideid, :slidename, :username, :type)";
		$psql = $conn->prepare($sql);
		$query = $psql->execute(array(":slideid"=>$id, ":slidename"=>$slidename, ":username"=>$username, ":type"=>$type));
	}
}

echo json_encode(array("message"=>$message,"imgQuery"=>$imagePath, "feedback"=>$feedback));
?>


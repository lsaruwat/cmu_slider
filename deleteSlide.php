<?php
session_start();
include("functions.php");
include("db/connect.php");

$id = (int)$_POST['id'];
$data = $_POST['data'];
$message = "Failed";

if($_SESSION['permissions'] == 'admin'){
	$sql = "DELETE FROM slide WHERE id=:id";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(":id"=>$id));
	$message = "Success";
}

echo json_encode(array("message"=>$message,"typeof"=>gettype($id), "id"=>$id, "post"=>$_POST));
?>


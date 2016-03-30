<?php

include("functions.php");
include("db/connect.php");


$sql = "SELECT id FROM slide";
$psql = $conn->prepare($sql);
$psql->execute();
$row = $psql->fetchAll();



foreach($row as $thing){
	$idArray[] = $thing['id'];
}

$randomIndex = rand(0,count($idArray)-1);

$id = $idArray[$randomIndex];

$sql = "SELECT * FROM slide WHERE id=:id";
$psql = $conn->prepare($sql);
$query = $psql->execute(array(":id"=>$id));
$row2 = $psql->fetchAll();

$message = "FAILED";

if($row2 != false){
	$message = "Success";
}

echo json_encode(array("id"=>$id, "idArray"=>$idArray, "message"=>$message, "slide"=>$row2));
?>

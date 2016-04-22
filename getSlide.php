<?php
session_start();

include("functions.php");


$sql = "SELECT id FROM slide";
$psql = $conn->prepare($sql);
$psql->execute();
$row = $psql->fetchAll();



foreach($row as $thing){
	$idArray[] = $thing['id'];
}

do{

	if($_SESSION['previous_index'] >= 0 && $_SESSION['previous_index'] < count($idArray)-1){
		$_SESSION['previous_index']++;
		$id = $idArray[$_SESSION['previous_index']];
	}

	else{
		$id = $idArray[0];
		$_SESSION['previous_index'] = 0;
	}

	$slide = getSlideById($id);
	$expired = expired($slide[0]);

}while($slide[0]['enabled'] == null || $expired);

$message = "FAILED";

if($slide != false){
	$message = "Success";
}

echo json_encode(array("id"=>$id, "expired"=>$expired, "message"=>$message, "slide"=>$slide));
?>

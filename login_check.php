<?php
session_start();

include("functions.php");
include("db/connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT salt FROM users WHERE username=:username";
$psql = $conn->prepare($sql);
$psql->execute(array(":username"=>$username));
$row = $psql->fetch();

$salt = $row['salt'];

$passwordHashed = hashPassword($password, $salt);


$sql = "SELECT * FROM users WHERE username=:username and password=:password";
$psql = $conn->prepare($sql);
$psql->execute(array(":username"=>$username,":password"=>$passwordHashed));
$row = $psql->fetch();

$message = "Username or Password not found";

if($row != false){
	$_SESSION['username'] = $row['username'];
	$_SESSION['permissions'] = $row['permissions'];
	$_SESSION['l_name'] = $row['l_name'];
	$_SESSION['f_name'] = $row['f_name'];
	$_SESSION['organization'] = $row['organization'];
	$_SESSION['email'] = $row['email'];
	$message = "Success";
}

echo json_encode(array("username"=>$_SESSION['username'], "message"=>$message));
?>

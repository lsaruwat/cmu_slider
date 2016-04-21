<?php
session_start();

include("functions.php");
include("db/connect.php");

$data = array();
parse_str($_POST['data'],$data);

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];
$confirm = $data['confirm'];
$key = $data['key'];

$sql = "SELECT * FROM Users 
		WHERE username=:username 
		AND email=:email";
$psql = $conn->prepare($sql);
$psql->execute(array(":username"=>$username, ":email"=>$email));
$row = $psql->fetch();

if($row != false) {
	if($password == $confirm) {
		$salt = createSalt();
		$passwordHashed = hashPassword($password, $salt);
		
		$sql = "UPDATE Users
		SET salt=:salt,
			password=:password
		WHERE username=:username";
		$psql = $conn->prepare($sql);
		$query = $psql->execute(array(":salt"=>$salt, ":password"=>$passwordHashed, ":username"=>$username));
		
		if($query)
			$message = "Password updated successfully";
		else 
			$message = "Error in updating password";
		
		$psql->closeCursor();
	}
	else
		$message = "Passwords do not match";
}
else
	$message = "Username or Email is invalid";

echo json_encode(array("username"=>$_SESSION['username'], "message"=>$message));
?>

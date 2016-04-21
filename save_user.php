<?php
session_start();
include("db/connect.php");

if($_SESSION['permissions'] === 'admin' || $_SESSION['permissions'] === "superuser") {
	$username = filter_input(INPUT_POST, 'username');
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$groupName = filter_input(INPUT_POST, 'groupName');
	$email = filter_input(INPUT_POST, 'email');
	$permissions = filter_input(INPUT_POST, 'permissions');

	$update_user = "UPDATE Users
	SET fname = :fname, 
		lname = :lname, 
		groupName = :groupName,
		email = :email, 
		permissions = :permissions
	WHERE username = :username";
	$statement = $conn->prepare($update_user);
	$statement->bindValue(":username", $username);
	$statement->bindValue(":fname", $fname);
	$statement->bindValue(":lname", $lname);
	$statement->bindValue(":groupName", $groupName);
	$statement->bindValue(":email", $email);
	$statement->bindValue(":permissions", $permissions);
	$statement->execute();
	$statement->closeCursor();

	include('users.php');
}

else {
	echo "You do not have permission to access this page.";
}
?>


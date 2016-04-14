<?php
session_start();
include("db/connect.php");

if($_SESSION['permissions'] === 'admin') {
	$username = filter_input(INPUT_POST, 'username');
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$email = filter_input(INPUT_POST, 'email');
	$group = filter_input(INPUT_POST, 'group');

	$update_user = "UPDATE users
	SET fname = :fname, 
		lname = :lname, 
		email = :email, 
		permissions = :group
	WHERE username = :username";
	$statement = $conn->prepare($update_user);
	$statement->bindValue(":username", $username);
	$statement->bindValue(":fname", $fname);
	$statement->bindValue(":lname", $lname);
	$statement->bindValue(":email", $email);
	$statement->bindValue(":group", $group);
	$statement->execute();
	$statement->closeCursor();

	include('users.php');
}

else {
	echo "You do not have permission to access this page.";
}
?>


<?php
include("db/connect.php");

if($_SERVER['HTTP_REFERER'] == 'http://baldr.whatever212.net/software16/edit_user.php') {
	$username = filter_input(INPUT_POST, 'username');
	$fname = filter_input(INPUT_POST, 'fname');
	$lname = filter_input(INPUT_POST, 'lname');
	$email = filter_input(INPUT_POST, 'email');
	$group = filter_input(INPUT_POST, 'group');

	$update_user = "UPDATE Users
	SET fname='" . $fname . "', lname='" . $lname . "', email='" . $email . "', group='" . $group . "'
	WHERE username='" . $username . "'";
	$statement = $conn->prepare($update_user);
	$statement->execute();
	$statement->closeCursor();

	include('users.php');
}

else {
	echo "You do not have permission to access this page.";
}
?>


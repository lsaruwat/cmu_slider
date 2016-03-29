<?php
include("db/connect.php");

$user = filter_input(INPUT_POST, 'username');

if($user != false) {
	$query = 'DELETE FROM Users
		  WHERE username = :username';
	$statement = $conn->prepare($query);
	$statement->bindValue(':username', $user);
	$statement->execute();
	$statement->closeCursor();
}

include('users.php');
?>

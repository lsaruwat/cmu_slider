<?php
include("db/connect.php");
include("functions.php"); 
$data = array();
parse_str($_POST['data'],$data);

$username = $data['username'];
$password = $data['password'];
$password2 = $data['password2'];
$fname = $data['fname'];
$lname = $data['lname'];
$email = $data['email'];
$groupName = $data['groupName'];
$permissions = $data['permissions'];



$sql = "SELECT COUNT(username) FROM Users WHERE username=:username";
$psql = $conn->prepare($sql);
$psql->execute(array(":username"=>$username));
$row = $psql->fetch();

// validate that it should be inserted
$status = "failed";
$query = false;

if($username == "" || $password == "" || $password2 == "" || $fname == "" || $lname == "" || $email == "" || $groupName == ""){ // passwords don't match
	$errorMessage = "One or more fields are blank!";
}

else if($password != $password2){ // passwords don't match
	$errorMessage = "Passwords don't match";
}

else if($row[0] != '0') { // username exists
	$errorMessage = "Username " . $username . " already exists!";
}


else{
	$salt = createSalt();

	$password = hashPassword($data['password'], $salt);

	$sql = "INSERT INTO Users (username, salt, password, fname, lname, email, groupName, permissions) 
			VALUES (:username,:salt,:password,:fname,:lname,:email,:groupName,:permissions)";
	$psql = $conn->prepare($sql);
	$query = $psql->execute(array(	":username"=>$data['username'],
							":salt"=>$salt,
							":password"=>$password,
							":fname"=>$data['fname'],
							":lname"=>$data['lname'],
							":email"=>$data['email'],
							":groupName"=>$data['groupName'],
							":permissions"=>$data['permissions']
							));
	if($query)$status = "inserted";
	$status = "not inserted";

	//check to make sure the query happened!!!
}

echo json_encode(array("username"=>$username, "status"=>$status, "errorMessage"=>$errorMessage, "password"=>$password));
?>
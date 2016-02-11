<?php

include("db/connect.php");
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT salt FROM users WHERE username=:username";
$psql = $conn->prepare($sql);
$psql->execute(array(":username"=>$username));
$row = $psql->fetch();

$salt = $row['salt'];
//
// do stuff
//
echo json_encode(array("username"=>$username, "password"=>$password, "query"=>$salt));

?>

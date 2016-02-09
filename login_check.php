<?php

$username = $_POST['username'];

$password = $_POST['password'];

echo json_encode(array("username"=>$username, "password"=>$password));

?>
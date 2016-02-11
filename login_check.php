<?php
//hi
$username = $_POST['username'];
$password = $_POST['password'];
 //
 // do stuff
 // 
echo json_encode(array("username"=>$username, "password"=>$password));

?>

<?php

$credentials = include("config.php");
$dest = "mysql:host=" . $credentials['host'] . ";dbname=" . $credentials['database'];

$conn=new PDO($dest, $credentials['username'], $credentials['password']);

?>
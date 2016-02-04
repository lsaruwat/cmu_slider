<?php
include("db/connect.php");

$sql = "SELECT * FROM users";
$psql=$conn->prepare($sql);
$psql->execute(array(":role"=>$nonsense));
$row= $psql->fetchALL();

foreach($row as $user){
	echo $user['username'];
}
?>
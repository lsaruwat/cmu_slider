<?php
session_start();

if(isset($_SESSION['username'])){
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

/*
$sql = "SELECT * FROM users"; // a string that is a mysql query
$psql = $conn->prepare($sql); // prepare the mysql statement
$psql->execute(); // execute the statement. if it is an insert then an associative array is used to avoid sql injection
$row = $psql->fetchALL(); // fetchALL gets all results from query as an associative array.
*/


echo "<h1>Welcome " . $_SESSION['f_name'] . " "  . $_SESSION['l_name'] . "</h1></br>";

}

else {
	echo "Please login to continue";
	var_dump($_SESSION);
}
?>
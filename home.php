<?php
if(isset($_SESSION['username'])){
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$sql = "SELECT * FROM users"; // a string that is a mysql query
$psql = $conn->prepare($sql); // prepare the mysql statement
$psql->execute(); // execute the statement. if it is an insert then an associative array is used to avoid sql injection
$row = $psql->fetchALL(); // fetchALL gets all results from query as an associative array.


foreach($row as $user){
	echo "<h1>Username: " . $user['username'] . "</h1></br>"; // associative array access
	echo "<h1>First Name: " . $user['f_name'] . "</h1></br>";
	echo "<h1>Last Name: " . $user['l_name'] . "</h1></br>";
	echo "<h1>Email: " . $user['email'] . "</h1></br>";

}

}

else echo "Please login to continue";
?>
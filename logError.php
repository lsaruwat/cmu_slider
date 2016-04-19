<?php
session_start();

$_SESSION['errorUrl'] = $_POST['url'];

$url = $_POST['url'];

date_default_timezone_set('America/Denver');
$dateTime = date('m/d/Y h:i:s a', time());
$date = date('m-d-Y', time());

$entry = $url . " - " . $dateTime . "\n";
$file = "logs/log-" . $date . ".txt"; //make a new log file for each day
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);

?>


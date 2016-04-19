<?php

$url = $_POST['url'];
$message = "Failed";


date_default_timezone_set('America/Denver');
$date = date('m/d/Y h:i:s a', time());

$entry = $url . " - " . $date . "\n";
$file = 'logs/log.txt';
// Write the contents to the file, 
// using the FILE_APPEND flag to append the content to the end of the file
// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);



$message = "Success";

//echo $_POST;
?>


<?php
session_start();

include("functions.php");
include("db/connect.php");

if($_SESSION['permissions'] === "superuser"){
	
	$data = array();
	parse_str($_POST['data'],$data);

	$confirm = $data['key_confirm'];
	$key = $data['key'];

	if($key === $confirm) {
		$salt = createSalt();
		$keyHashed = hashPassword($key, $salt);
		

		$sql = "SELECT COUNT(id) FROM `keys`";
		$psql = $conn->prepare($sql);
		$query = $psql->execute();
		$row = $psql->fetch();
		if((int)$row[0] < 1){
		
		$sql = "INSERT INTO `keys`(salt, `key`) VALUES(:salt,:key)";
		$psql = $conn->prepare($sql);
		$query = $psql->execute(array(":salt"=>$salt, ":key"=>$keyHashed));
		
		}

		else{
		$sql = "UPDATE `keys` SET salt=:salt, `key`=:key"; // should only be one so don't even write a where clause
		$psql = $conn->prepare($sql);
		$query = $psql->execute(array(":salt"=>$salt, ":key"=>$keyHashed));
		}
		if($query)
			$message = "KEY updated successfully";
		else 
			$message = "Error in updating Key";
		
		$psql->closeCursor();
	}
	else  $message = "Keys do not match";

	echo json_encode(array("message"=>$message, "row"=>$row[0] ));
}
//endif

else echo json_encode(array("message"=>"Incorrect Permissions!!!!!!!!!!!"));
?>

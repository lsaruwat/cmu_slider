<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "login";
include("header.php");

?>
<!-- Main Content Begin -->

<form>
	<input type="text" name="username" id="username"/>
	<input type="password" name="password" id="password"/>
	<input type="submit" value="Submit" id="login_submit"/>
</form>

<!-- Main Content End -->
<?php

include("footer.php");
?>
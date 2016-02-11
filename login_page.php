<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "login";
include("header.php");

?>
<!-- Main Content Begin -->

<div class="container login_container">
	<div class="one-third column">&nbsp;</div>

	<div class="one-third column">
		<form id="login_form">
			<h3 class="section-heading" align="center">Login</h3>
			<label for="username">Username</label>
			<input type="text" name="username" id="username" class="u-full-width login_input"/>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" class="u-full-width login_input"/>
			<br/><br/>
			<center><input type="submit" value="Submit" id="login_submit" class="button-primary login_button"/></center>
			<div id="login_error" class="error"></div>
		</form>
	</div>

	<div class="one-third column">&nbsp;</div>
</div>

<!-- Main Content End -->
<?php

include("footer.php");
?>

<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "login";
include("header.php");

?>
<!-- Main Content Begin -->

<div class="container login_container">
	<div class="one-third column">&nbsp;</div>

	<div class="one-third column login_box">
		<h3 class="section-heading" align="center">Login</h3>
		<form id="login_form">
			<div class="row">
				<label for="username">Username</label>
				<input type="text" name="username" id="username" class="u-full-width"/>
			</div>
			
			<div class="row">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="u-full-width"/>
				<a href="forgotPassword.php">Forgot Password?</a><br/>
			</div>
			
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

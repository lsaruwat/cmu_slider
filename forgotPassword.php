<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "forgotPassword";
include("header.php");

?>
<!-- Main Content Begin -->

<div class="container">
	<form id="forgot_pass_form">
		<div class="row">
			
			<div class="row">
				<div class="six columns">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="u-full-width"/>
				</div>

				<div class="six columns">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="six columns">
					<label for="password">New Password</label>
					<input type="password" name="password" id="password" class="u-full-width"/>
				</div>

				<div class="six columns">
					<label for="confirm">Confirm Password</label>
					<input type="password" name="confirm" id="confirm" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<input type="submit" value="Submit" id="forgot_pass__submit" class="button-primary"/>
				</div>
			</div>
			<div class="row">
				<div class="twelve columns">
					<div class="error" id="feedback_message"></div>
				</div>
			</div>
		</div>
		
	</form>
</div>

<!-- Main Content End -->
<?php

include("footer.php");
?>

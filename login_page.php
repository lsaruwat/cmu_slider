<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "login";
include("header.php");

?>
<!-- Main Content Begin -->

<div class="container">
	<form>
		<div class="row">
			<div class="row">
				<div class="twelve columns">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<input type="submit" value="Submit" id="login_submit" class="button-primary"/>
				</div>
			</div>
		</div>
		
	</form>
</div>

<!-- Main Content End -->
<?php

include("footer.php");
?>
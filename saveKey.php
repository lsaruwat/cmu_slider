<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "forgotPassword";
include("header.php");
if($_SESSION['permissions'] === "superuser"){
?>
<!-- Main Content Begin -->

<div class="container">
	<form id="forgot_pass_form">
		<div class="row">
			<div class="six columns">
				<label for="key">Key</label>
				<input type="text" name="key" id="key" class="u-full-width"/>
			</div>
			<div class="six columns">
				<label for="key_confirm">Confirm key</label>
				<input type="text" name="key_confirm" id="key_confirm" class="u-full-width"/>
			</div>
		</div>
	</form>
</div>

<!-- Main Content End -->
<?php
}
//endif

include("footer.php");
?>

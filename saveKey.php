<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "save key";
include("header.php");
if($_SESSION['permissions'] === "superuser"){
?>
<!-- Main Content Begin -->

<div class="container">
	<form id="create_key">
		<div class="row">
			<div class="six columns">
				<label for="key">Key</label>
				<input type="password" name="key" id="key" class="u-full-width"/>
			</div>
			<div class="six columns">
				<label for="key_confirm">Confirm key</label>
				<input type="password" name="key_confirm" id="key_confirm" class="u-full-width"/>
			</div>
		</div>

		<div class="row">
			<input type="submit" class="u-full-width button-primary"/>
		</div>

	</form>
</div>

<!-- Main Content End -->
<?php
}
//endif

include("footer.php");
?>

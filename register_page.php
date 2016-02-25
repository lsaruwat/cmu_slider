<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "register";
include("header.php");

?>
<!-- Main Content Begin -->

<div class="container">
	<form id="register_form">
		<div class="row">
			<div class="row">
				<div class="six columns">
					<label for="f_name">First Name</label>
					<input type="text" name="f_name" id="f_name" class="u-full-width"/>
				</div>

				<div class="six columns">
					<label for="l_name">Last Name</label>
					<input type="text" name="l_name" id="l_name" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="six columns">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" class="u-full-width"/>
				</div>

				<div class="six columns">
					<label for="group">Group</label>
					<input type="text" name="group" id="group" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				
				<div class="six columns">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="u-full-width"/>
				</div>
				<div class="six columns">
					<label for="permissions">Permissions</label>
				<!--	<input type="text" name="permissions" id="permissions" class="u-full-width"/> -->
					<select name="permissions" id="permissions" class="u-full-width"/>
						<?php
						foreach($conn->query('SELECT type from PERMISSIONS') as $row) {
							echo "<option value=\"" . $row['type'] . "\">" . $row['type'] . "</option>";
						}
						?>
					</select>
				</div>

			</div>

			<div class="row">
				<div class="six columns">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="u-full-width"/>
				</div>

				<div class="six columns">
					<label for="password2">Confirm Password</label>
					<input type="password" name="password2" id="password2" class="u-full-width"/>
				</div>
			</div>

			<div class="row">
				<div class="twelve columns">
					<input type="submit" value="Submit" id="login_submit" class="button-primary"/>
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

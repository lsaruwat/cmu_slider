<?php 
session_start();
include("db/connect.php");

$pageTitle = "edit";
include("header.php");

//TODO: Currently hard-coded because HTTP_REFERER includes whole link.
//if($_SERVER['HTTP_REFERER'] == 'http://baldr.whatever212.net/software16/users.php') {
if($_SESSION['permissions'] === 'admin' || $_SESSION['permissions'] === "superuser") {
	$username = filter_input(INPUT_POST, 'username');
	$user_query = "SELECT *
	FROM Users
	WHERE username = '" . $username . "'";
	$user_statement = $conn->prepare($user_query);
	$user_statement->execute();
	$user = $user_statement->fetch();
	$user_statement->closeCursor();
?>
<!-- Main Content Begin -->

<div class="container edit_user_container">
	<h1><?php echo $username ?></h1><br>
	<form id="edit_user_form" action="save_user.php" method="post">
		<input type="hidden" name="username" value="<?php echo $username; ?>"/>
		<div class="row">
			<div class="six columns">
				<label for="fname">First Name</label>
				<input type="text" name="fname" value="<?php echo $user['fname']; ?>" class="u-full-width"/><br><br>
			</div>
			<div class="six columns">
				<label for="lname">Last Name</label>
				<input type="text" name="lname" value="<?php echo $user['lname']; ?>" class="u-full-width"/><br><br>
			</div>		
		</div>
		<div class="row">
			<div class="six columns">
				<label for="email">Email</label>
				<input type="text" name="email" value="<?php echo $user['email']; ?>" class="u-full-width"/><br><br>
			</div>
			<div class="six columns">
				<label for="groupName">Group</label>
				<input type="text" name="groupName" value="<?php echo $user['groupName']; ?>" class="u-full-width"/><br><br>
			</div>
		</div>
		<div class="row">
			<div class="four columns">
				<label for="permissions">Permissions</label>
				<select name="permissions" id="permissions" class="u-full-width">
					<?php foreach($conn->query('SELECT type from Permissions') as $row) {
						if($user['permissions'] != $row['type'])
							echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
						else
							echo "<option selected value='" . $row['type'] . "'>" . $row['type'] . "</option>";
					} ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="four columns">&nbsp;</div>
			<div class="two columns">
				<input type="submit" value="Save" id="edit_user_save" class="button-primary"/>
			</div>
			<div class="six columns">
				<input type="button" value="Cancel" onclick="window.location.href = 'users.php';"/>
			</div>
		</div>
	</form>
</div>

<!-- Main Content End -->
<?php
include("footer.php");

} //endif REFERER check
else {
	echo "You do not have permission to access this page.";
}

?>

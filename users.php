<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "users";
include("header.php");

if(isset($_SESSION['username'])){
	$group_query = "SELECT permissions 
	FROM Users 
	WHERE username='" . $_SESSION['username'] . "'";
	$group_statement = $conn->prepare($group_query);
	$group_statement->execute();
	$group = $group_statement->fetchColumn(0);
	$group_statement->closeCursor();
	
	if($group == 'Kalvin') {
		$users_query = "SELECT *
		FROM Users
		ORDER BY username";
		$users_statement = $conn->prepare($users_query);
		$users_statement->execute();
		$users = $users_statement->fetchAll();
		$users_statement->closeCursor();
?>
<!-- Main Content Begin -->

<div class="container users_container">
	<h1>Users</h1>
	<table>
		<tr>
			<th>Username</th>
			<th>First</th>
			<th>Last</th>
			<th>Email</th>
			<th>Group</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		
<?php foreach ($users as $user) : ?>
		<tr>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['fname']; ?></td>
			<td><?php echo $user['lname']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['permissions']; ?></td>
			
			<!-- TODO: Dropdown menu for each user possible, but
					   maybe easier to create edit_user.php and
					   edit one user at a time? Versus checking
					   whether any of the selects have been modified:
					   http://www.sitepoint.com/detect-html-form-changes/
			<td>
				<select name="echo $user['username']" id="echo $user['username']">
					<?php /* foreach($conn->query('SELECT type from Permissions') as $row) {
						if($user['permissions'] != $row['type'])
							echo "<option value=\"" . $row['type'] . "\">" . $row['type'] . "</option>";
						else
							echo "<option selected value=\"" . $row['type'] . "\">" . $row['type'] . "</option>";
					}
					*/ ?>
				</select>
			</td>
			-->
			
			<td>
				<form action="edit_user.php" method="post">
					<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					<input type="submit" value="Edit">
				</form>
			</td>
			<td>
				<form action="delete_user.php" method="post">
					<input type="hidden" name="username" value="<?php echo $user['username']; ?>">
					<input type="submit" value="Delete">
				</form>
			</td>
		</tr>
<?php endforeach; ?>

	</table>
</div>

<!-- Main Content End -->
<?php
include("footer.php");
	} //endif isadmin
	else {
		echo "You do not have permission to access this page.";
		echo $group;
	}
} // endif username isset

else {
	$loginURL = "login_page.php";
	echo "Please <a href='$loginURL'>login</a> to continue";
}
?>

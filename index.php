<?php
/*
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "index";
include("header.php");

if(isset($_SESSION['username'])){
	//May need to JOIN template table if not put into separate table
	$query = "SELECT * 
	FROM Slideshow 
	ORDER BY editdate DESC";
	$statement = $conn->prepare($query);
	$statement->execute();
	$slides = $statement->fetchAll();
	$statement->closeCursor();
	
	$perm_query = "SELECT permissions 
	FROM Users 
	WHERE username='$_SESSION['username']'
	JOIN Permissions ON Users.permissions=Permissions.type";
	$perm_statement = $conn->prepare($perm_query);
	$perm_statement->execute();
	$permissions = $perm_statement->fetchAll();
	$perm_statement->closeCursor();
?>
<!-- Main Content Begin -->

<div class="container index_container">
	<h1>Slides</h1>
	<table>
		<tr>
			<th>Title</th>
			<th>Created By</th>
			<th>Edited By</th>
			<th>Last Edited</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		
<?php foreach ($slides as $slide) : ?>
		<tr>
			<td><?php echo $slide['slidename']; ?></td>
			<td><?php echo $slide['createdby']; ?></td>
			<td><?php echo $slide['editedby']; ?></td>
			<td><?php echo $slide['editdate']; ?></td>
			
			<!-- TODO: Unsure of best way to handle editting
				 and deleting slide entries. Logan/Austin
				 revise if needed using JS or other methods. -->
			
			<td> <!-- Edit -->
				<?php
					if($permissions['editslide'] == 1) {
				?>
						<form action="edit.php" method="post">
							<input type="hidden" name="slide_id" value="<?php echo $slide['slideid']; ?>">
							<input type="submit" value="Edit">
						</form>
				<?php
					} //endif
					
					else {
						echo "&nbsp;";
					}
				?>
			</td>
			
			<td> <!-- Delete -->
				<?php
					if($permissions['deleteslide'] == 1) {
				?>
						<form action="delete.php" method="post">
							<input type="hidden" name="slide_id" value="<?php echo $slide['slideid']; ?>">
							<input type="submit" value="Delete">
						</form>
				<?php
					} //endif
					
					else {
						echo "&nbsp;";
					}
				?>
			</td>
		</tr>
<?php endforeach; ?>
		
	</table>
</div>

<!-- Main Content End -->
<?php
include("footer.php");

} // endif

else {
	$loginURL = "http://baldr.whatever212.net/software16/login_page.php"
	echo "Please <a href='$loginURL'>login</a> to continue";
}
*/
?>

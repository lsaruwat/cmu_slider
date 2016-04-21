<?php
session_start();
include("db/connect.php");

$pageTitle = "edit slides";
include("header.php");
if($_SESSION['permissions'] === "admin" || $_SESSION['permissions'] === "superuser"){
?>

<div class="row table-titles">
	<div class='one columns' style='text-align: right;'><h3>Id</h3></div>
	<div class='one columns'><h3>Delete</h3></div>
	<div class='two columns'><h3>Title</h3></div>
	<div class='two columns'><h3>Content</h3></div>
	<div class='one columns'><h3>Update</h3></div>
	<div class='five columns'><h3>Image/Url</h3></div>
</div>
<?php

	$sql = "SELECT * FROM slide ORDER BY id";
	$psql = $conn->prepare($sql);
	$psql->execute();
	$rows = $psql->fetchAll();

	foreach($rows as $row){
		?>
		<form method='POST' id="slide_<?php echo $row['id'];?>">
		<div class='edit-slide row'>
			
			<div class='one columns'>
				<input type="checkbox" name="enabled" value="<?php echo (bool)$row['enabled'];?>"><?php echo $row['enabled'];?> Enabled
			</div>

			<div class='one columns' style="margin-left: 0px;">
				<input type='hidden' name='id' value="<?php echo $row['id'];?>"/>
				<input type='button' onclick="deleteSlideById(event,<?php echo $row['id'];?>)" value='Delete'/>
			</div>
			
			<div class='one columns'>
				<input type='submit' class='slide_form' value='Update'/>
			</div>

			<div class='one columns'>
				<input type="date" name="startDate" value="<?php echo $row['startDate'];?>"/>
			</div>
			
			<div class='one columns'>
				<input type="date" name="endDate" value="<?php echo $row['endDate'];?>"/>
			</div>

			<div class='two columns'>
				<input type='text' name='title' value="<?php echo $row['title'];?>" />
			</div>
			<div class='two columns'>
				<textarea name='content' rows='20' cols='20'><?php echo $row['content'];?></textarea>
			</div>
			<div class='two columns'><input type="text" name="img" id="img" value="<?php echo $row['image'];?>" /> </div>
			<div class='two columns'><input type="text" name="url" id="url" value="<?php echo $row['url'];?>" /> </div>
		</div>
		</form>
	<?php
	}
include("footer.php");

}
//endif

else {
	$loginURL = "login_page.php";
	echo "Please <a href='$loginURL'>login</a> to continue";

}

?>
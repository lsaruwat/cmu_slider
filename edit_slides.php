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
		<form method='POST' id="slide_<?php echo $row['id'];?>" class="slide-form">
		<div class='edit-slide row'>

			<div class='two columns medium'>
				<label for="startDate">Starting Date</label>
				<input type="date" name="startDate" value="<?php echo $row['startDate'];?>"/>
			</div>
			
			<div class='two columns medium'>
				<label for="endDate">End Date</label>
				<input type="date" name="endDate" value="<?php echo $row['endDate'];?>"/>
			</div>

			<div class='two columns'>
				<label for="img">Image</label>
				<input type="text" name="img" id="img" value="<?php echo $row['image'];?>" /> 
			</div>
			<div class='two columns'>
				<label for="url">Website Url</label>
				<input type="text" name="url" id="url" value="<?php echo $row['url'];?>" /> 
			</div>

			<div class='two columns'>
				<label for="title">Title</label>
				<input type='text' name='title' value="<?php echo $row['title'];?>" />
			</div>
			<div class='two columns'>
				<label for="content">Content</label>
				<textarea name='content' rows='20' cols='30'><?php echo $row['content'];?></textarea>
			</div>

		</div>
		<div class='edit-slide row'>
			
			<div class='one columns small'>
				 <label for="enabled">Enabled</label>
				<input type="checkbox" name="enabled" value="1" <?php if($row['enabled']){echo 'checked';}?>>
			</div>

			<div class='one columns small' style="float: right; margin-right: 30px;">
				<input type='submit' class='slide_form button-primary' value='Update'/>
			</div>
	

			<div class='one columns small' style="float: right; margin-right: 30px;">
				<input type='hidden' name='id' value="<?php echo $row['id'];?>"/>
				<input type='button' onclick="deleteSlideById(event,<?php echo $row['id'];?>)" value='Delete'/>
			</div>
			


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
<?php
session_start();
include("db/connect.php");
 
$pageTitle = "edit slides";
include("header.php");
if($_SESSION['permissions'] === "admin" || $_SESSION['permissions'] === "superuser"){

	$sql = "SELECT * FROM slide ORDER BY id DESC";
	$psql = $conn->prepare($sql);
	$psql->execute();
	$rows = $psql->fetchAll();

	foreach($rows as $row){
		?>
		<form method='POST' id="slide_<?php echo $row['id'];?>" class="slide-form">
		<?php if(!$row['enabled']){
			echo "<div class='disabled'></div>";
		}
		?>
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

			<div class='one columns medium'>
				<?php 
				if(isFuture($row)) echo "<h3 class='yellow'>Future</h3>";
				else if(expired($row)) echo "<h3 class='red'>Expired</h3>";
				else echo "<h3 class='green'>Active</h3>";
				?>
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

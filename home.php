<?php
session_start();
include("db/connect.php"); // this connects to the cmu_slider db so we can query it

$pageTitle = "home";
include("header.php");

if(isset($_SESSION['username'])){
?>
<!-- Main Content Begin -->
<script src="//cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>
<textarea name="editor1"></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>


<?php

} // endif

else {
	echo "Please login to continue";
}

?>
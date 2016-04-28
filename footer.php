<div class="container">
  <div id="response_message"></div>
  <!-- universal ajax response messages go here --> 
     <div id="bottom-nav">
        <div class="row">
          <div class="twelve columns">			 
            <a href="home.php" title="Create a slide" >Home</a>
            <a href="users.php" title="Edit or delete users!">Edit Users</a>          
            <?php
            if($_SESSION['permissions'] === 'admin' || $_SESSION['permissions'] === "superuser") {
				echo "<a href='edit_slides.php' title='Insert, edit, or delete slides' >Edit Slides</a>";
				echo "<a href='transactions.php' title='Look at the last 50 slide transactions' >Transactions</a>";
			}
            if($_SESSION['permissions'] === "superuser") {
				echo "<a href='register_page.php' title='Create a user' >Register</a>";
				echo "<a href='saveKey.php' title='For password resets' >Manage Key</a>";
			}
            ?>
            <a href="forgotPassword.php">Reset Password</a>
            <a href="logout.php" title="Go back to login page" >Logout</a>
          </div>
        </div>
      </div>
<!-- end of container -->
</div>
<!-- javscript goes here -->

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/global.js"></script>
<script src="js/<?php echo str_ireplace(" ","-",$pageTitle); ?>.js"></script>

<!-- end of javascript linking -->

</body>
</html>

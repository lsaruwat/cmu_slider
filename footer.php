<div class="container">
  <div id="response_message"></div>
  <!-- universal ajax response messages go here --> 
     <div id="bottom-nav">
        <div class="row">
          <div class="twelve columns">
            <a href="home.php" >Home</a>
            <a href="register_page.php" >Register</a>
            <a href="edit_user.php" >Edit Users</a>
            <a href="edit_slide.php" >Edit Slides</a>
            <a href="logout.php" >Logout</a>
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
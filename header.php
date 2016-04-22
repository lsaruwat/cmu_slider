<?php
include("functions.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo ucfirst($pageTitle); ?></title>
    <!-- Css stylesheets go here -->

    <link rel=stylesheet type="text/css" href="css/skeleton/skeleton.css">
    <link rel=stylesheet type="text/css" href="css/skeleton/normalize.css">
    <link rel=stylesheet type="text/css" href="css/global.css">
    
    <!-- Css stylesheets go here -->
  </head>
  <body>
  <h1 class="title"><?php echo ucfirst($pageTitle); ?></h1>
  <div class="container">
    <div id="navigation">
      <div class="row">
        <div class="four columns">
          <a href="home.php" title="Create a slide"><h4>Create Slide</h4></a>
        </div>
        <div class="four columns">
          <a href="edit_slides.php" title="Insert, edit, or delete slides"><h4>Edit Slides</h4></a>
        </div>
        <div class="four columns">
          <a href="users.php" title="Edit or delete users"><h4>Edit Users</h4></a>
        </div>
      </div>
    </div>
  </div>

<?php include_once('includes/profileupload.inc.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link rel="shortcut icon" href="logos/mePipe.png">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="settings.css">
</head>
<body>
  <?php
  require "header.php"
  ?>
  <?php
  require "navbar.php"
  ?>
  <div class="container">
  <h1>Basic Info<h1>
  <h2>Avatar</h2>
  <form action="includes/profileupload.inc.php" method="post" enctype="multipart/form-data">
  <?php
    if ($_SESSION['img']== 'avatar.png'){
      echo '<img  class="img" src="profiles/avatar.png" onClick="triggerClick()" id="profileDisplay"></img>';
    }else {
      echo "<img  class='img' src='profiles/".$img."' onClick='triggerClick()' id='profileDisplay'></img>";
    }
  ?>
  <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" style="display: none;">
  <div id="buttonai">
  <button id="new" name="save_profile" type="submit" > Upload a new avatar</button>
  </form>
  <form action="includes/deleteimg.inc.php">
  <button id="delete"> Delete avatar</button>
  </form>
  </div>
  <?php
      if (isset($_GET["change"])) {
        if ($_GET["change"] == "photo") {
          echo '<p class="changesucc">You have changed your profile picture successfully!</p>';
        }
        else if ($_GET["change"] == "notype") {
          echo '<p style="color:red;text-align: center;" >You didnt choose a picture or its in wrong format, it needs to be in png or jpg!</p>';
        }
        else if($_GET["change"] == "delsuc"){
          echo '<p class="changesucc">You deleted your profile image successfully!</p>';
        }
        else if($_GET["change"] == "deluns"){
          echo '<p style="color:red;text-align: center;">There seems to be a problem!</p>';
        }
        else if($_GET["change"] == "nopic"){
          echo '<p style="color:red;text-align: center;">To delete avatar you first need to upload one!</p>';
        }
      }
  ?>
  <h2> Personal details</h2>
  <form method="post" action="includes/settings.inc.php">
  <?php
      if (isset($_GET["change"])) {
        if ($_GET["change"] == "success") {
          echo '<p class="changesucc">Changes have been applied!</p>';
        }
        if ($_GET["change"] == "uiduse") {
          echo '<p style="color:red;text-align: center;">Username already in use!</p>';
        }
      }
  ?>
  <div class="form">
    <h3>Username:</h3>
    <?php
    if (!isset($_SESSION['username'])){
      echo '<input name="username" placeholder="Username" type="text"/>';
    }else{
    echo '<input name="username" placeholder="Username" type="text" value="'.$_SESSION["username"].'" />';
    }
    ?>
  </div>
  <div class="form">
    <h3>First name:</h3>
    <?php
    if (!isset($_SESSION['first'])){
    echo '<input name="first" placeholder="First name" type="text" />';
  }else{
    echo '<input name="first" placeholder="First name" type="text" value="'.$_SESSION["first"].'"/>';
  }
    ?>
  </div>
  <div class="form">
    <h3>Last name:</h3>
    <?php
    if (!isset($_SESSION['last'])){
      echo '<input name="last" placeholder="Last name" type="text" />';
    }else{
      echo '<input name="last" placeholder="Last name" type="text" value="'.$_SESSION["last"].'"/>';
    }
    ?>
  </div>
  <div class="form">
    <h3>Country:</h3>
    <?php
    if (!isset($_SESSION['country'])) {
      echo '<input name="country" placeholder="Country" type="text" />';
    }else{
      echo '<input name="country" placeholder="Country" type="text" value="'.$_SESSION["country"].'"/>';
    }
    ?>
  </div>
  <div class="form">
    <h3>City:</h3>
    <?php
    if (!isset($_SESSION['city'])){
      echo '<input name="city" placeholder="City" type="text" />';
    } else {
      echo '<input name="city" placeholder="City" type="text" value="'.$_SESSION["city"].'"/>';
    }
     ?>
  </div>
  <div class="form">
    <button type="submit" name="info-submit"> Apply </button>
  </div>
  </form>
</div>
<script src="script.js"></script>
</body>
</html>

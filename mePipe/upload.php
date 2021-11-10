<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link rel="shortcut icon" href="logos/mePipe.png">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="upload.css">
</head>
<body>
  <?php
  session_start();
  require "header.php"
  ?>
  <?php
  require "navbar.php"
  ?>
  <div class="container">
  <h1>Profile<h1>
  <h2>Video upload</h2>
  <form action="includes/videoupload.inc.php" method="post" enctype="multipart/form-data">
    <div class="form">
      <h3>Video name:</h3>
      <input name="videoname" placeholder="Enter video name" type="text" />
    </div>
    <script type="text/javascript" src="upload.js"></script>
    <label class="choosefile" style="width:90px">
      <input type="file" name="video" style="display:none;" name="chooseFile">
      Select video
    </label>
    <label class="choosefile" style="width:120px;">
      <input type="file" name="thumbnail" style="display:none;" name="chooseFile2">
      Select thumbnail
    </label>
    <button type="submit" name="uploadVideo" class="upload"> Upload video!</button>
  </form>
  <?php
      if (isset($_GET["status"])) {
        if ($_GET["status"] == "wrngvidtype") {
          echo '<p style="color:red;text-align: center;">Wrong video type, choose mp4 or avi!</p>';
        }
        else if ($_GET["status"] == "vidfail") {
          echo '<p style="color:red;text-align: center;" >Failed to upload your video!</p>';
        }
        else if ($_GET["status"] == "vidbig") {
          echo '<p style="color:red;text-align: center;" >Video is too big!</p>';
        }
        else if ($_GET["status"] == "wrngthumbtype") {
          echo '<p style="color:red;text-align: center;" >Wrong thumbnail type, choose jpg or png!</p>';
        }
        else if ($_GET["status"] == "thumbfail") {
          echo '<p style="color:red;text-align: center;" >Failed to upload your thumbnail!</p>';
        }
        else if ($_GET["status"] == "thumbig") {
          echo '<p style="color:red;text-align: center;" >Thumbnail is too big!</p>';
        }
        else if ($_GET["status"] == "noname") {
          echo '<p style="color:red;text-align: center;" >Please enter your video name!</p>';
        }
      }else{
      if(isset($_SESSION['uploadsuccessful'])){
        echo '<p style="color:green;text-align: center;">Video uploaded successfully</p>';
        unset($_SESSION['uploadsuccessful']);
      }
    }
   ?>
</div>
</body>
</html>

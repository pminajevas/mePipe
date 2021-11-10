<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MePipe</title>
    <link rel="shortcut icon" href="logos/mePipe.png">
    <link rel="stylesheet" type="text/css" href="index.css">
  </head>
  <body>
    <?php
    require "header.php"
    ?>
    <?php
      if ($_SESSION['username']=="" || $_SESSION['first']=="" || $_SESSION['last']==""){
        echo '<a href="settings.php" class="update"><h3> Please update your profile info! Click here!</h3></a>';
      }
    ?>
    <?php
    require "navbar.php"
    ?>
    <div id="contentas">
    <?php
    require "includes/videoshow.inc.php" ?>
  </div>
  </body>
</html>

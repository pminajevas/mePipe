<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Profile</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="profile.css">
</head>
<body>
    <?php
      require "header.php";
      require "navbar.php";
      require "includes/profile.inc.php"
     ?>
</body>
</html>

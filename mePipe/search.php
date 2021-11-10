<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MePipe</title>
    <link rel="shortcut icon" href="logos/mePipe.png">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" type="text/css" href="subscriptions.css">
  </head>
  <body>
    <?php
    require "header.php";
    require "navbar.php";
    ?>
    <div id="container">
    <?php
      if (isset($_POST['submitsearch'])){
        $search = mysqli_real_escape_string($mysqli, $_POST['search']);
        $sql = "SELECT * FROM videos WHERE name LIKE '%$search%'";
        $result= mysqli_query($mysqli, $sql);
        $queryResult=mysqli_num_rows($result);
        if ($queryResult > 0){
          echo '<h1> Videos found: '.$queryResult.'</h1>';
          while($row = mysqli_fetch_assoc($result)){
            echo '<div class="videobox">
            <div class="videoboxas">
              <div id="thumbas">
              <a style="text-decoration: none;" href="video.php?video='.$row['videoName'].'">
              <img src="thumbnails/'.$row['thumbnailName'].'">
              </div>
              <span>'.$row['name'].'</span>
              </a>
            </div>
            </div>';
          }
        }
      $searchnew = mysqli_real_escape_string($mysqli, $_POST['search']);
      $sqlnew= "SELECT * FROM users WHERE uidUsers LIKE '%$search'";
      $resultnew= mysqli_query($mysqli, $sqlnew);
      $queryResultNew=mysqli_num_rows($resultnew);
      if($queryResultNew > 0){
        echo '<h1 style="float: left;width: 100%;"> Profiles found: '.$queryResultNew.'</h1>';
        while($newrow = mysqli_fetch_assoc($resultnew)){
          echo '<div class="boxas">
            <div>
            <a href="profile.php?uid='.$newrow['uidUsers'].'"><img  class="foto" src="profiles/'.$newrow['imgUsers'].'"></a>
            <spam class="name">
              '.$newrow['uidUsers'].'
            </spam>
          </div>
          </div>';
        }
      }
      }
    ?>
  </body>
</html>

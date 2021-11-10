<?php
  require 'dbh.inc.php';
  $name = $_GET['video'];
  $sql = "SELECT name, userId, thumbnailName from videos where videoName='$name'";
  $result = $mysqli-> query($sql);
  $row = mysqli_fetch_array($result);
  $id=$row['userId'];
  $sqlnew = "SELECT uidUsers, imgUsers FROM users WHERE idUsers='$id';";
  $resultnew = $mysqli-> query($sqlnew);
  $newrow = mysqli_fetch_array ($resultnew);
      echo '<div id="contentas">
            <div class="videoBox">
              <div class="videoImageBox">
                <video controls poster="thumbnails/'.$row['thumbnailName'].'">
                  <source src="videos/'.$name.'" type="video/mp4">
                  <source src="videos/'.$name.'" type="video/avi">
                  Your browser does not support the video tag.
                </video>
                </div>
        <div class="videoInfo">
          <img src="profiles/'.$newrow['imgUsers'].'" alt="" class="videoProfilePicture">';
          $subid=$_SESSION['id'];
          echo '<h1 class="videoTitle">'.$row['name'].' </h1>
          <h5 class="videoCreator">'.$newrow['uidUsers'].'</h5>
        </div>
      </div>
    </div>';

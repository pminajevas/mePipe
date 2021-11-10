<?php
  require 'dbh.inc.php';
  session_start();
  if (isset($_POST['uploadVideo'])) {
   $video = $_FILES['video'];
   $videoName = $video['name'];
   $videoTmpName = $video['tmp_name'];
   $videoSize = $video['size'];
   $videoError = $video['error'];
   $videoExt = explode(".", $videoName);
   $videoActualExt = strtolower(end($videoExt));
   $allowedVideo = ['mp4', 'avi'];


   $thumb = $_FILES['thumbnail'];
   $thumbName = $thumb['name'];
   $thumbTmpName = $thumb['tmp_name'];
   $thumbSize = $thumb['size'];
   $thumbError = $thumb['error'];
   $thumbExt = explode(".", $thumbName);
   $thumbActualExt = strtolower(end($thumbExt));
   $allowedThumb = ['jpg', 'png'];

   $name = $_POST['videoname'];

   if (!in_array($videoActualExt, $allowedVideo)){
     header("Location: ../upload.php?status=wrngvidtype");
   }else{
     if($videoError !== 0){
       header("Location: ../upload.php?status=vidfail");
     }
     else{
       if ($videoSize > 1000000000){
         header("Location: ../upload.php?status=vidbig");
       }
       else{
         if (!in_array($thumbActualExt, $allowedThumb)){
           header("Location: ../upload.php?status=wrngthumbtype");
         }
         else{
           if($videoError !== 0){
             header("Location: ../upload.php?status=thumbfail");
           }
           else{
             if($thumbSize > 1000000){
               header("Location: ../upload.php?status=thumbig");
             }
             else{
               if($name == ""){
                 header("Location: ../upload.php?status=noname");
               }
               else{
                  $videoNameNew = uniqid('', true) . '.' . $videoActualExt;
                  $videoDestination = '../videos/' . $videoNameNew;
                  $thumbNameNew = uniqid('', true) . '.' . $thumbActualExt;
                  $thumbDestination = '../thumbnails/' . $thumbNameNew;
                  $userId = $_SESSION['id'];
                  $sql = "INSERT INTO videos (name, videoName, userId, thumbnailName) VALUES (?, ?, ?, ?)";
                  $stmt = $mysqli->stmt_init();
                  $stmt->prepare($sql);
                  $stmt->bind_param('ssis', $name, $videoNameNew, $userId, $thumbNameNew);
                  $stmt->execute();
                  $stmt->close();
                  move_uploaded_file($videoTmpName, $videoDestination);
                  move_uploaded_file($thumbTmpName, $thumbDestination);
                  $_SESSION['uploadsuccessful'] = TRUE;
                  header("Location: ../upload.php");
                }
              }
            }
          }
        }
      }
    }
  }
 ?>

<?php
 require 'dbh.inc.php';
 if (mysqli_connect_errno()) {
     printf("Connect failed: %s\n", mysqli_connect_error());
     exit();
 }else {
   $sql = "SELECT name, videoName, userId, thumbnailName from videos";
   $result = $mysqli-> query($sql);
   if($result-> num_rows > 0){
     while ($row = $result->fetch_assoc()){
       $id=$row['userId'];
       $sqlnew = "SELECT uidUsers, imgUsers FROM users WHERE idUsers='$id';";
       $resultnew = $mysqli-> query($sqlnew);
       $newrow = mysqli_fetch_array ($resultnew);
       echo '<div class="videoBox">
         <a href="video.php?video='.$row['videoName'].'"><div class="videoImageBox">
            <img src="thumbnails/' .$row['thumbnailName']. '" alt="video name" class="videoImage">
         </div>
         </a>
         <div class="videoInfo">
           <a href="profile.php?uid='.$newrow['uidUsers'].'"><img src="profiles/' .$newrow['imgUsers']. '" alt="" class="videoProfilePicture"></a>';
        
        echo '<h1 class="videoTitle"> '.$row['name'].' </h1>
           <h5 class="videoCreator">'. $newrow['uidUsers'].'</h5>
         </div>
       </div>';
     }
   }
   else{
     echo '<a href="upload.php" id="novideos"><h1 id="novideos"> There are no videos uploaded yet! Click here to be the first one!</h1></a>';
   }
 }

?>

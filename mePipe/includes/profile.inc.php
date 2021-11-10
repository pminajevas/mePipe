<?php
  require 'dbh.inc.php';
  if ($_GET['uid']==''){
    echo '<h1 style="text-align:center;color:#505e6c">First update your settings! To do that <a style="color:#3350D9;text-decoration:none;"href="../settings.php"> click here</a>!</h1>';
  }else if($_GET['uid']==$_SESSION['username']){
    echo '<div id="container">
      <div id="infobox">
      <div id="avataras">
      <img class="avatar" src="profiles/'.$_SESSION['img'].'">
      </div>
      <div id="informacija">
      <h2 class="info"> '.$_SESSION['username'].' </h2>
      <h2 class="info"> '.$_SESSION['first'].' '.$_SESSION['last'].'</h2>
      <h2 class="info"> '.$_SESSION['country'].', '.$_SESSION['city'].' </h2>
      </div>
      <div id="subai">';
      $id=$_SESSION['id'];
      $subcheck="SELECT * FROM subscriptions WHERE idsubscribedto='$id';";
      $subs = $mysqli-> query($subcheck);
      $subcount = mysqli_num_rows($subs);
      echo '<h3> Subscribers: '.$subcount.'</h3>
      </div>
      </div>
      <h1> Your videos :</h1>';
      $sql="SELECT name, videoName, thumbnailName from videos where userId='$id'";
      $result = $mysqli-> query($sql);
      if($result-> num_rows > 0){
        while ($row = $result->fetch_assoc()){
          echo '<div class="videobox">
          <div class="videoboxas">
            <div id="thumbas">
            <a style="text-decoration: none;" href="video.php?video='.$row['videoName'].'">
            <img src="thumbnails/'.$row['thumbnailName'].'">
            </div>
            <span>'.$row['name'].'</span>
            </a>
          </div>
          </div>';}
      }
      echo '</div>';
  }else{
    $user=$_GET['uid'];
    $sqlnew="SELECT idUsers, firstUsers, lastUsers, countryUsers, cityUsers, imgUsers FROM users WHERE uidUsers='$user';";
    $resultnew = $mysqli-> query($sqlnew);
    $rownew = mysqli_fetch_array($resultnew);
    echo '<div id="container">
      <div id="infobox">
      <div id="avataras">
      <img class="avatar" src="profiles/'.$rownew['imgUsers'].'">
      </div>
      <div id="informacija">
      <h2 class="info"> '.$user.' </h2>
      <h2 class="info"> '.$rownew['firstUsers'].' '.$rownew['lastUsers'].'</h2>
      <h2 class="info"> '.$rownew['countryUsers'].', '.$rownew['cityUsers'].' </h2>
      </div>
      <div id="subai">';
      $subid=$_SESSION['id'];
      $id=$rownew['idUsers'];
      $sqlsub= "SELECT idSubscriber, idSubscribedto FROM subscriptions WHERE idSubscriber='$subid' AND idSubscribedto='$id';";
      $subai= $mysqli-> query($sqlsub);
      $sub = mysqli_num_rows($subai);
      if ($sub==0){
        $_SESSION['prof']=$user;
        echo '<form method="post" action="includes/subscriptions.inc.php"><button type="submit" name="sub" value="'.$id.'">Subscribe</button></form>';
      }else{
        $_SESSION['prof']=$user;
        echo '<form method="post" action="includes/unsubscriptions.inc.php"><button type="submit" name="unsub" value="'.$id.'">Subscribed</button></form>';
      }
      $subcheck="SELECT * FROM subscriptions WHERE idsubscribedto='$id';";
      $subs = $mysqli-> query($subcheck);
      $subcount = mysqli_num_rows($subs);
      echo '<h3> Subscribers: '.$subcount.'</h3>
      </div>
      </div>
      <h1> '.$_GET['uid'].' videos :</h1>';
      $sql="SELECT name, videoName, thumbnailName from videos where userId='$id'";
      $result = $mysqli-> query($sql);
      if($result-> num_rows > 0){
        while ($row = $result->fetch_assoc()){
          echo '<div class="videbox">
          <div class="videoboxas">
            <div id="thumbas">
            <a style="text-decoration: none;" href="video.php?video='.$row['videoName'].'">
            <img src="thumbnails/'.$row['thumbnailName'].'">
            </div>
            <span>'.$row['name'].'</span>
            </a>
          </div>
          </div>';}
      }
      echo '</div>';
  }
 ?>

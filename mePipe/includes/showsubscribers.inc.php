<?php
  include_once 'dbh.inc.php';
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }else {
    $sub=$_SESSION['id'];
    $sql = "SELECT idSubscriber, idSubscribedto from subscriptions where idSubscriber='$id'";
    $result = $mysqli-> query($sql);
    if($result-> num_rows > 0){
      while ($row = $result->fetch_assoc()){
        $id=$row['idSubscribedto'];
        $sqlnew = "SELECT uidUsers, imgUsers FROM users WHERE idUsers='$id';";
        $resultnew = $mysqli-> query($sqlnew);
        $newrow = mysqli_fetch_array ($resultnew);
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
    exit();

<?php
  require 'dbh.inc.php';
  $id=$_SESSION['id'];
  $sql="SELECT * FROM users WHERE idUsers='$id';";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);
  if ($row['imgUsers'] == 'avatar.png'){
    $_SESSION['img']='avatar.png';
  }else {
    $_SESSION['img']= $row['imgUsers'];
  }

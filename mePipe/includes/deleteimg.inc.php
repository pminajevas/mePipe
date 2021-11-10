<?php
  session_start();
  include_once 'dbh.inc.php';
  $img=$_SESSION['img'];
  $id=$_SESSION['id'];
  if ($img != 'avatar.png'){
  $path = "../profiles/$img";
  if (!unlink($path)){
    header("Location: ../settings.php?change=deluns");
  } else {
    $sql = "UPDATE users SET imgUsers='avatar.png' WHERE idUsers='$id';";
    mysqli_query($mysqli, $sql);
    header("Location: ../settings.php?change=delsuc");
  }
}else{
  header("Location: ../settings.php?change=nopic");
}

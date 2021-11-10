<?php
  session_start();
  require 'dbh.inc.php';
  $subto = $_POST['sub'];
  $sub = $_SESSION['id'];
  $sql = "INSERT INTO subscriptions (idSubscriber, idSubscribedto) VALUES ($sub, $subto);";
  mysqli_query($mysqli, $sql);
  header("Location: ../profile.php?uid=".$_SESSION['prof']."");
  exit();
 ?>

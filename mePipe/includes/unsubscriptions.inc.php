<?php
  session_start();
  require 'dbh.inc.php';
  $subto = $_POST['unsub'];
  $sub = $_SESSION['id'];
  $sql="DELETE FROM subscriptions WHERE idSubscriber='$sub' AND idSubscribedto='$subto';";
  mysqli_query($mysqli, $sql);
  echo $_SESSION['prof'];
  header("Location: ../profile.php?uid=".$_SESSION['prof']."");
  exit();
 ?>

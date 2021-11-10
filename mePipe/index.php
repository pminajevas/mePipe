<?php
  session_start();
  if (!isset($_SESSION['id'])) {
    require "login.php";
  }
  else {
    require "main.php";
  }
?>

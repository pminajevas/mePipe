<?php
  require 'dbh.inc.php';
  session_start();
  $email = $_SESSION['email'];
  $username = $_POST['username'];
  $first = $_POST['first'];
  $last = $_POST['last'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $check="SELECT uidUsers FROM users WHERE uidUsers='$username'";
  $checkq= mysqli_query($mysqli, $check);
  if (mysqli_num_rows($checkq)==0){
  $sql = "UPDATE users SET uidUsers='$username', firstUsers='$first', lastUsers='$last', countryUsers='$country', cityUsers='$city' WHERE emailUsers='$email';";
  mysqli_query($mysqli, $sql);
  $_SESSION['username'] = $username;
  $_SESSION['first'] = $first;
  $_SESSION['last'] = $last;
  $_SESSION['country'] = $country;
  $_SESSION['city'] = $city;
  header("Location: ../settings.php?change=success");
}else {
  header("Location: ../settings.php?change=uiduse");
}

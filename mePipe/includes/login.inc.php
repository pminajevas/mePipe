<?php
  session_start();
  require 'dbh.inc.php';
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($mailuid) || empty($password)) {
    if (empty($mailuid)){
    $_SESSION['noemail']=TRUE;
    }
    if (empty($password)){
    $_SESSION['nopwd']=TRUE;
    }
    header("Location: ../index.php?error=emptyfields");
    $_SESSION['email']=$mailuid;
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE emailUsers=?;";
    $stmt = $mysqli->stmt_init();
    if (!$stmt->prepare($sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      $stmt->bind_param("s", $mailuid);
      $stmt->execute();
      $stmt->bind_result($id,$email,$pwd, $uid, $first, $last, $country, $city, $img);
      $stmt->fetch();
      if ($pwd) {
        $pwdCheck = password_verify($password, $pwd);
        if ($pwdCheck == false) {
          $_SESSION['nopwd']=TRUE;
          $_SESSION['email']=$mailuid;
          header("Location: ../index.php?error=wrongpwd");
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['id'] = $id;
          $_SESSION['email'] = $email;
          $_SESSION['username'] = $uid;
          $_SESSION['first'] = $first;
          $_SESSION['last'] = $last;
          $_SESSION['country'] = $country;
          $_SESSION['city'] = $city;
          header("Location: ../index.php");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=wronguidpwd");
        $_SESSION['noemail']=TRUE;
        exit();
      }
    }
  }
  $stmt->close();
  $mysqli->close();
?>

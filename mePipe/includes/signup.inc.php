<?php
  session_start();
  require 'dbh.inc.php';
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];
  if (empty($email) || empty($password) || empty($passwordRepeat)) {
    if (empty($email)){
    $_SESSION['noemail']=TRUE;
    }
    if (empty($password)){
    $_SESSION['nopwd']=TRUE;
    }
    if (empty($passwordRepeat)){
    $_SESSION['nopwdr']=TRUE;
    }
    header("Location: ../register.php?error=emptyfields");
    $_SESSION['email']=$email;
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail=".$email);
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../register.php?error=passwordcheck&mail=".$email);
    exit();
  }
  else if(!isset($_POST['terms'])){
    header("Location: ../register.php?error=terms");
    exit();
  }
  else {
    $sql = "SELECT count(*) FROM users WHERE emailUsers=?";
    $stmt = $mysqli->stmt_init();
    if ( !$stmt->prepare($sql)) {
      header("Location: ../register.php?error=sqlerror");
      exit();
    } else {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($eml);
        $stmt->fetch();
        if ($eml > 0) {
          header("Location: ../register.php?error=mailtaken");
          exit();
        } else {
          $sql = "INSERT INTO users (emailUsers, pwdUsers, imgUsers) VALUES (?, ?, 'avatar.png');";
          if (!$stmt->prepare($sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
          } else {
              try {
              $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
              $stmt->bind_param("ss", $email, $hashedPwd);
              $stmt->execute();
              } catch (Exception $e) {
                  echo 'Caught exception: ',  $e->getMessage(), "\n";
              }
              header("Location: ../register.php?signup=success");
              exit();
          }
        }
      $stmt->close();
      $mysqli->close();
    }
  }
?>

<?php
  require 'dbh.inc.php';
  session_start();
  $id=$_SESSION['id'];
    if (isset($_POST['save_profile'])) {
      $file = $_FILES['profileImage'];
      $fileName = $file['name'];
      $fileExt = explode(".", $fileName);
      $fileActualExt = strtolower(end($fileExt));
      $fileTmpName = $file['tmp_name'];
      $profileImageName = "profile".$id.".".$fileActualExt;
      $target_file = "../profiles/" .$profileImageName;
      $allowed = ['jpg', 'png'];
      if (in_array($fileActualExt, $allowed)){
      move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file);
      $sql = "UPDATE users SET imgUsers='$profileImageName' WHERE idUsers='$id';";
      mysqli_query($mysqli, $sql);
      $_SESSION['img']= $profileImageName;
      header("Location: ../settings.php?change=photo");
    }else{
      header("Location:../settings.php?change=notype");
    }

    }
?>

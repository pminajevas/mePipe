<?php
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>


                        <!---Loginas----->
  <div class=forma>
    <form action="includes/login.inc.php" method="post">
      <div class="logo">
       <img src="images/logo.png">
      </div>
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyfields") {
            echo '<p class="signinerror">Fill in all fields!</p>';
          }
          else if ($_GET["error"] == "wrongpwd") {
            echo '<p class="signinerror">Invalid password, please try again!</p>';
          }
          else if ($_GET["error"] == "wronguidpwd") {
            echo '<p class="signinerror">Invalid email, please try again!</p>';
          }
        }
      ?>
      <div class="form">
        <?php
          if(isset($_SESSION['noemail'])){
            echo '<input name="mailuid" placeholder="Email" type="email" style="border:solid 1px red" >';
            unset($_SESSION['noemail']);
          }else{
            if (isset($_SESSION['email'])) {
              echo '<input name="mailuid" placeholder="Email" type="email" value="'.$_SESSION['email'].'">';
              unset($_SESSION['email']);
            }else{
              echo '<input name="mailuid" placeholder="Email" type="email">';
            }
          }
        ?>
      </div>
      <div class="form">
        <?php
          if(isset($_SESSION['nopwd'])){
            echo '<input name="pwd" placeholder="Password" type="password" style="border:solid 1px red">';
            unset($_SESSION['nopwd']);
            }else{
              echo '<input name="pwd" placeholder="Password" type="password">';
            }
        ?>
      </div>
      <div class="form">
        <button type="submit" name="login-submit"> Log in </button>
      </div>
      <a class="register" href="register.php">Dont have an account? Register here!</a>
      <a class="register" href="forgot.php">Forgot your password? Click here!</a>
    </form>
  </div>
</body>
</html>

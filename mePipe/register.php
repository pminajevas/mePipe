<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
                      <!---Registracija------>

  <div class="reg">
    <div class="left">
      <a href="index.php"><img src="images/reg.png"></a>
    </div>
    <form method="post" action="includes/signup.inc.php">
      <h1> <strong>Create</strong> an account.</h1>
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyfields") {
            echo '<p class="signuperror">Fill in all fields!</p>';
          }
          else if ($_GET["error"] == "invaliduidmail") {
            echo '<p class="signuperror">Invalid e-mail!</p>';
          }
          else if ($_GET["error"] == "passwordcheck") {
            echo '<p class="signuperror">Your passwords do not match!</p>';
          }
          else if ($_GET["error"] == "mailtaken") {
            echo '<p class="signuperror">Email already in use!</p>';
          }
          else if ($_GET["error"] == "terms") {
            echo '<p class="signuperror">You need to agree to the license terms!</p>';
          }
        }
        else if (isset($_GET["signup"])) {
          if ($_GET["signup"] == "success") {
            header( "refresh:1;url=login.php" );
            echo '<p class="signupsuccess">Signup successful! You will be redirected in 1s!</p>';
          }
        }
      ?>
      <div class="regform">
        <?php
          if(isset($_SESSION['noemail'])){
            echo '<input type="email" name="mail" placeholder="Enter email" style="border:solid 1px red">';
            unset($_SESSION['noemail']);
          }else{
            if (isset($_SESSION["email"])) {
              echo '<input type="email" name="mail" placeholder="Enter email" value="'.$_SESSION["email"].'">';
              unset($_SESSION['email']);
            }else{
              echo '<input type="email" name="mail" placeholder="Enter email">';
            }
          }
        ?>
      </div>
      <div class="regform">
        <?php
          if(isset($_SESSION['nopwd'])){
            echo '<input name="pwd" placeholder="Enter password" type="password" style="border:solid 1px red"/>';
            unset($_SESSION['nopwd']);
          }else{
            echo '<input name="pwd" placeholder="Enter password" type="password" />';
          }
        ?>
      </div>
      <div class="regform">
        <?php
          if(isset($_SESSION['nopwdr'])){
            echo '<input name="pwd-repeat" placeholder="Repeat password" type="password" style="border:solid 1px red"/>';
            unset($_SESSION['nopwdr']);
          }else{
            echo '<input name="pwd-repeat" placeholder="Repeat password" type="password" />';
          }
        ?>
      </div>
      <div class="regform">
        <label>
          <input type="checkbox" href="conditions.php" name="terms"/>
             I agree to the <a href="conditions.php" id="terms">license terms</a>.
        </label>
      </div>
      <div class="regform">
        <button type="submit" name="signup-submit"> Register </button>
      </div>
      <a class="login" href="index.php">Already have an account? Log in!</a>
    </form>
  </div>
</body>
</html>

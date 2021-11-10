<?php
  require "includes/dbh.inc.php";
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MePipe</title>
    <link rel="shortcut icon" href="logos/mePipe.png">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="subscriptions.css">
  </head>
  <body>
    <?php
    require "header.php";
    require "navbar.php";
    ?>
    <div id="container">
      <h1> People you are subscriped to:</h1>
       <?php
       require "includes/showsubscribers.inc.php";
        ?>

  </div>
  </body>
</html>

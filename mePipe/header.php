<?php
  if(!isset($_SESSION['email'])){
    header("Location: index.php");
  }
  include ('includes/imgcheck.inc.php');
 ?>

<div id="head">
  <a href="index.php"><img class="fullLogo" src="logos/fullMePipe.png" alt="MePipe"></a>
  <div class="searchBar">
    <form class="search" action="search.php" method="post">
      <input class="searchInput" type="text" name="search" placeholder="Search...">
      <button class="searchConfirmation" type="submit" name="submitsearch">Search</button>
    </form>
  </div>
  <div class="profile">
    <?php
    $img=$_SESSION['img'];
    if ($_SESSION['img']=='avatar.png'){
      echo "<a href='profile.php?uid=".$_SESSION['username']."'><img src='profiles/avatar.png' alt='face' class='profilePicture'></a>";
    }else {
      echo "<a href='profile.php?uid=".$_SESSION['username']."'><img src='profiles/".$img."' alt='face' class='profilePicture'></a>";
    }
    ?>
    <form action="includes/logout.inc.php" method="post" class="logOut">
    <button class="signIn" type="submit" name="Logout" > Log out</button>
    </form>
  </div>
</div>

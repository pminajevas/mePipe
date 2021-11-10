<div class="navBar">
  <table class="nav">
    <tr>
      <td><a style="color:black;" href="index.php">Home</a></td>
    </tr>
    <tr>
      <td><a href="upload.php">Upload</a></td>
    </tr>
    <tr>
      <td><a href="subscriptions.php">Subscriptions</a></td>
    </tr>
    <tr>
      <?php
        echo '<td><a href="profile.php?uid='.$_SESSION['username'].'">Profile</a></td>'
      ?>
    </tr>
    <tr>
      <td><a href="settings.php">Settings</a></td>
    </tr>
  </table>
</div>

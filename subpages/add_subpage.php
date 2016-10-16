<?php
  session_start();
  include 'header.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add subpage</title>
  </head>
  <body>
    <form method="post" action="add_subpage_core.php">
      <input type="text" placeholder="Tytuł podstrony" name="subpage_name"/>
      <?php
      if (isset($_SESSION['subpage_name_error'])) {
        echo "<p>".$_SESSION['subpage_name_error']."</p>";
        unset($_SESSION['subpage_name_error']);
      }
      if (isset($_SESSION['subpage_exist_error'])) {
        echo "<p>".$_SESSION['subpage_exist_error']."</p>";
        unset($_SESSION['subpage_exist_error']);
      }

      ?>
      <input type="submit" value="Wyślij" name="wyslij" />
    </form>
  </body>
</html>

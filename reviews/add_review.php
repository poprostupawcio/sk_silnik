<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css" media="screen" title="no title">
  </head>
  <body>
    <h1> Wystaw opinię </h1>

    <form method="POST" action="add_review_core.php">
      <?php
        if(isset($_SESSION['empty_field'])) {
          echo "<p style='color:red'>".$_SESSION['empty_field']."</p>";
          unset($_SESSION['empty_field']);
        }
      ?>
      <input type="text" name="sender" placeholder="Twoje imię i nazwisko">
      <?php
        if(isset($_SESSION['sender_too_short'])) {
          echo "<p style='color:red'>".$_SESSION['sender_too_short']."</p>";
          unset($_SESSION['sender_too_short']);
        }
      ?>
      <textarea cols="40" rows="20" name="review" placeholder="Twoja opinia"></textarea>
      <?php
        if(isset($_SESSION['review_too_short'])) {
          echo "<p style='color:red'>".$_SESSION['review_too_short']."</p>";
          unset($_SESSION['review_too_short']);
        }
      ?>
      <input type="submit" name="send_review" value="Wyślij">
    </form>
  </body>
</html>

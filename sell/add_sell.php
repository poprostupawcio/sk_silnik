<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add sell offert</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <?php
    if (isset($_SESSION['connect_error'])) {
      echo $_SESSION['connect_error'];
      unset($_SESSION['connect_error']);
    }
    if (isset($_SESSION['sell_add_correct'])) {
      echo "<p>".$_SESSION['sell_add_correct']."</p>";
      unset($_SESSION['sell_add_correct']);
    }
    ?>

    <p> Dodaj nieruchomość </p>
    <form action="add_sell_core.php" method="post" enctype="multipart/form-data">
        <input type="text" name="sell_title" placeholder="Podaj nazwę nieruchomości">
        <?php
        if (isset($_SESSION['strlen_title_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_title_error']."</p>";
          unset($_SESSION['strlen_title_error']);
          }
        ?>

        <input type="text" name="sell_address" placeholder="Podaj adres nieruchomości">
        <?php
        if (isset($_SESSION['strlen_address_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_address_error']."</p>";
          unset($_SESSION['strlen_address_error']);
          }
        ?>
        <input type="text" name="sell_price" placeholder="Podaj cenę nieruchomości">
        <?php
        if (isset($_SESSION['not_numeric_price_error'])) {
          echo "<p style='color:red;'>".$_SESSION['not_numeric_price_error']."</p>";
          unset($_SESSION['not_numeric_price_error']);
          }
        ?>
        <textarea cols="50" rows="15" placeholder="Opis" name="sell_description"></textarea>
        <?php
        if (isset($_SESSION['strlen_description_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_description_error']."</p>";
          unset($_SESSION['strlen_description_error']);
          }
        ?>
        <input type="file" name="sell_img" id="sell_img">
        <input type="submit" name="sell" value="Dodaj">
        <?php
          if (isset($_SESSION['main_error'])) {
            echo "<p style='color:red;'>".$_SESSION['main_error']."</p>";
            unset($_SESSION['main_error']);
          }
        ?>

    </form>
  </body>
</html>

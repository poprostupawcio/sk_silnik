<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <ul>
      <li><a href="../subpages/page_list.php">Lista podstron</a></li>
      <li><a href="../subpages/add_subpage.php"> Dodaj podstronę</a> </li>
      <li><a href="../add_content/add_content.php"> Dodaj treść do podstrony</a> </li>
      <li><a href="../sell/add_sell.php"> Dodaj ofertę sprzedaz</a> </li>
    </ul>
    <h1> Zaloguj się </h1>
    <?php
    if (isset($_SESSION['empty_fields'])) {
      echo "<p>".$_SESSION['empty_fields']."</p>";
      unset($_SESSION['empty_fields']);
    }
    ?>
    <form method="POST" action="sign_in_core.php">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Hasło">
        <input type="submit" name="send" value="Zaloguj">
    </form>
  </body>
  </html>

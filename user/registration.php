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
    <h1> Rejestracja </h1>
    <form method="POST" action="registration_core.php">
      <?php
      if (isset($_SESSION['connect_error'])) {
        echo "<p>".$_SESSION['connect_error']."</p>";
        unset($_SESSION['connect_error']);
      }
      ?>
        <label> Podaj login<input type="text" name="login" placeholder="Login"></label>
        <?php
        if (isset($_SESSION['login_too_short'])) {
          echo "<p>".$_SESSION['login_too_short']."</p>";
          unset($_SESSION['login_too_short']);
        }
        if (isset($_SESSION['user_exist_error'])) {
          echo "<p>".$_SESSION['user_exist_error']."</p>";
          unset($_SESSION['user_exist_error']);
        }
        ?>
        <label> Podaj hasło <input type="password" name="password" placeholder="Hasło"></label>
        <?php
        if (isset($_SESSION['password_too_short'])) {
          echo "<p>".$_SESSION['password_too_short']."</p>";
          unset($_SESSION['password_too_short']);
        }
        ?>
        <input type="submit" name="send" value="Zarejestruj">
    </form>
  </body>
  </html>

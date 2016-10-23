<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <ul>
      <?php
      session_start();
      echo '<li><a href="../subpages/page_list.php">Lista podstron</a></li>';
      echo '<li><a href="../subpages/add_subpage.php"> Dodaj podstronę</a> </li>';
      echo '<li><a href="../add_content/add_content.php"> Dodaj treść do podstrony </a></li>';
      echo '<li><a href="add_sell.php"> Dodaj ofertę sprzedaz</a> </li>';
      echo '<li><a href="sell_list.php"> Lista ofert sprzedazy</a> </li>';
      if (@$_SESSION['sign_in']==TRUE) {
        echo '<li><a href="../user/logout.php"> Wyloguj sie</a> </li>';
      } else {
        echo '<li><a href="../user/registration.php">Rejestracja</a> </li>';
        echo '<li><a href="../user/sign_in.php">Zaloguj sie</a> </li>';
      }

      ?>
    </ul>
    <?php

      if (isset($_SESSION['sign_in'])) {
        echo "<p style='color:green;border-bottom:1px dashed black'>Witaj".$_SESSION['user']."</p>";
      }
    ?>

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
      <li><a href="../add_content/add_content.php"> Dodaj treść do podstrony </a></li>
      <li><a href="add_sell.php"> Dodaj ofertę sprzedaz</a> </li>
      <li><a href="sell_list.php"> Lista ofert sprzedazy</a> </li>
    </ul>
    <?php
      session_start();
      if (isset($_SESSION['sign_in'])) {
        echo "<p style='color:green;border-bottom:1px dashed black'>Witaj".$_SESSION['user']."</p>";
      }
    ?>
<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sell list</title>
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <p style="font-size:40px;font-weight:bold; text-align:center;"> Lista ofert </p>
    <?php
    require_once "../connect.php";
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
      echo "<p>Nie udalo polaczyc sie z baza. Szczegoly:".mysqli_connect_errno()."</p>";
    }
    if ($result=mysqli_query($connect,"SELECT * FROM sell")) {
      while ($row=mysqli_fetch_assoc($result)) {
        echo "<div style='border:2px solid black; margin:15px 0;'>";
        echo "<p style='font-weight:bold;text-align:center'>".$row['sell_title']."|<a href='sell_page.php?id_sell=".$row['id_sell']."'>Sprawdź</a></p>";
        echo "<p><a href='edit_sell.php?id_sell=".$row['id_sell']."'>Edytuj</a>|<a href='delete_sell.php?id_sell=".$row['id_sell']."'>Usuń</a></p>";
        echo "<p>Adres: ".$row['sell_address']."</p>";
        echo "<p>Cena: ".$row['sell_price']."</p>";
        echo "<p>".$row['sell_description']."</p>";
        $query = "SELECT * FROM sell_img WHERE id_sell='$row[id_sell]'";
        $result_img=mysqli_query($connect,$query);
        while ($row_img=mysqli_fetch_assoc($result_img)){
            echo "<img src='".$row_img['sell_img_path']."'>";
        }
        echo "</div>" ;
          $_SESSION['id_sell']=$row['id_sell'];
      }
    }

    ?>
  </body>
  </html>

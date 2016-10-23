<?php
  include 'header.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $_SESSION['id_sell']=$_GET['id_sell'];
      require('../connect.php');
      $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
      if (mysqli_connect_errno()) {
        echo "<p>Nie mozna polaczyc sie z baza danych</p>" ;
      }else {
        $result=mysqli_query($connect, "SELECT * FROM sell where id_sell='$_SESSION[id_sell]'");
        while ($row=mysqli_fetch_assoc($result)) {
          echo "<div style='border:2px solid black; margin:15px 0;'>";
          echo "<p style='font-weight:bold;text-align:center'>".$row['sell_title']."</p>";
          echo "<p>Adres: ".$row['sell_address']."</p>";
          echo "<p>Cena: ".$row['sell_price']."</p>";
          echo "<p>".$row['sell_description']."</p>";
          $query = "SELECT * FROM sell_img WHERE id_sell='$row[id_sell]'";
          $result_img=mysqli_query($connect,$query);
          while ($row_img=mysqli_fetch_assoc($result_img)){
              echo "<img src='".$row_img['sell_img_path']."'>";
          }
          echo "</div>" ;
          echo "<h2> KOMENTARZE </h2>";
          echo "<form method='POST' action='add_comment.php'>";
          echo "<textarea cols='40' rows='10' placeholder='Treść komentarza' name='comment'></textarea>";
          echo "<input type='submit' name='send' value='WYSLIJ'>";
          echo "</form>";
          if (isset($_SESSION['correct'])) {
            echo "<p>".$_SESSION['correct']."</p>";
            unset($_SESSION['correct']);
      }
    } /*END WHILE */
    $result=mysqli_query($connect,"SELECT * FROM comments_sell where id_sell='$_SESSION[id_sell]'");
    while($row=mysqli_fetch_assoc($result)) {
      $result2=mysqli_query($connect,"SELECT * FROM users where id_user='$row[id_user]'");
      $row2=mysqli_fetch_assoc($result2);
      echo "<div style='border:1px solid black;margin:15px 0;'>";
      echo "<p>AUTOR:".$row2['user_login']."</p>";
      echo "<p>".$row['text_comment_sell']."</p>";
      echo "</div>";
       }
  }

     ?>


  </body>
</html>

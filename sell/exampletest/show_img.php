<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once "../connect.php";
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
    echo "Nie udalo się polączyć z baza. Szczegoly:</br>".mysqli_connect_error();
    exit();
  }else {
    $query = "SELECT * FROM sell_img";
    if ($result=mysqli_query($connect,$query)) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>".$row['sell_img_name']."</p>";
        echo "<img src='".$row['sell_img_path']."'>";
    }
    }
  }
  ?>
  </body>
</html>

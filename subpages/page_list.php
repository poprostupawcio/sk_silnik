<?php
  error_reporting(0);
  include 'header.php';
 ?>
    <?php
    require_once "../connect.php";
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
    echo "Nie udalo się polączyć z baza. Szczegoly:</br>".mysqli_connect_error();
    exit();
  }else {
    $query = "SELECT * FROM subpages";
    if ($result=mysqli_query($connect,$query)) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<p><a href='page.php?id_subpage=".$row['id_subpage']."'>-> ".$row['subpage_name']."</a></p></br>";
    }
    }
  }
  ?>
  </body>
</html>

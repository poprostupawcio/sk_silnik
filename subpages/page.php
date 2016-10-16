    <?php
    include 'header.php';
    require_once "../connect.php";
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if(mysqli_connect_errno()){
      echo "<p>Nie mozna polaczyc sie z baza danych. Szczegoly: ".mysqli_connect_errno()."</p>";
      exit();
    }
    if ($result=mysqli_query($connect,"SELECT * FROM content WHERE id_subpage='$_GET[id_subpage]'")) {
      $row=mysqli_num_rows($result);
      if ($row==0) {
        echo "<p>Ta podstrona nie ma zadnej tresci!</p>";
        echo "<a href='../add_content/add_content.php'><p>Jeśli chcesz dodać treść kliknij tutaj</p></a>";
      } else {
        while($row=mysqli_fetch_assoc($result)) {
          echo "<div style='border:2px solid black;margin:15px 0;'>";
          echo "<p class='title'>".$row['title']."</p>";
          echo "<p>".$row['text']."</p>";
          echo "</div>";
        }
      }
    }
     ?>
  </body>
</html>

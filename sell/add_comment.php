<?php
  session_start();
  if(!isset($_POST['send'])) {
    header('Location: sell_list.php');
  } else {
    $comment = $_POST['comment'];
    $id_user=$_SESSION['user_id'];
    $id_sell= $_SESSION['id_sell'];
    require '../connect.php';
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
      echo "<p>Nie mozna polaczyc sie z baza danych</p>" ;
    }else {
        if ($result=mysqli_query($connect,"INSERT INTO comments_sell VALUES (NULL, '$id_user', '$id_sell', '$comment')")) {
          $_SESSION['correct']="Twoja tresc została dodana";
          header('Location:sell_page.php?id_sell='.$_SESSION[id_sell]);
        } else {
          echo "blad";
        }
    }
  }

?>

<?php
session_start();

  if(!isset($_POST['send'])) {
    header('Location: sign_in.php');
  } else {
    if (empty($_POST['login']) || empty($_POST['password'])) {
      $_SESSION['empty_fields'] = "Wszystkie pola muszą być uzupełnione!";
      header('Location: sign_in.php');
      exit();
    } else {
      $login = $_POST['login'];
      $password = $_POST['password'];

      require '../connect.php';
      $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
      if(mysqli_connect_errno()) {
        $_SESSION['connect_error'] = "Nie mozna polaczyc sie z bazą danych. Szczegoly:".mysqli_connect_errno();
        header('Location:registration.php');
      } else {
        $result=mysqli_query($connect,"SELECT * FROM users where user_login='$login' AND user_password='$password'");
        $row=mysqli_num_rows($result);
        if ($row==1) {
          $_SESSION['user'] = $login;
          $_SESSION['sign_in'] = TRUE;

          echo "ZOSTALES ZALOGOWANY".$login;
        } else {
          echo "Podales bledny login abo haslo";
        }
     }
  }
}

 ?>

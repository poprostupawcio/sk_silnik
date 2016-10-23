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
        $result = mysqli_query($connect, "SELECT * FROM users WHERE user_login='$login'");
        $row=mysqli_num_rows($result);
        if ($row==0) {
          $_SESSION['login_not_exist'] = "Nie istnieje uzytkownik o podanym loginie";
          header('Location:sign_in.php');

        } else {
        $user = mysqli_fetch_assoc($result) ;
        $hashpassword = $user['user_password'];
        if (password_verify($password,$hashpassword)) {
          $_SESSION['user'] = $login;
          $_SESSION['user_id']= $user['id_user'];
          $_SESSION['sign_in'] = TRUE;
          header('Location:../index.php');
        } else {
          $_SESSION['wrong_password'] = "Podałeś błędne hasło";
          header('Location:sign_in.php');

        }
      }
     }
  }
}

 ?>

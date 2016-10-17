<?php
session_start();

  if(!isset($_POST['send'])) {
    header('Location:registration.php');
  }else {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (strlen($login)<4) {
      $_SESSION['login_too_short'] = "Login musi się składać z minimum 4 znakow";
      header('Location:registration.php');
    } else {
      require '../connect.php';
      $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
      if(mysqli_connect_errno()) {
        $_SESSION['connect_error'] = "Nie mozna polaczyc sie z bazą danych. Szczegoly:".mysqli_connect_errno();
        header('Location:registration.php');
      } else {
        if ($result=mysqli_query($connect,"SELECT * FROM users where user_login='$login'")) {
          $row=mysqli_num_rows($result);
          if ($row>0) {
          $_SESSION['user_exist_error'] = "Istnieje juz uzytkownik o podanym loginie";
          header('Location:registration.php');
          exit();
        } else {
          mysqli_query($connect,"INSERT INTO users VALUE (NULL, '$login', '$password')");
          echo "DODANO USERA";
        }
      }
    }
  }
}


 ?>

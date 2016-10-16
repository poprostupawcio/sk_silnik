<?php

session_start();

if (!isset($_POST['send']))
{
  header('Location:sell_list.php');
  exit();
} else {
  if ((empty($_POST['sell_title'])) || (empty($_POST['sell_address'])) || (empty($_POST['sell_price'])) || (empty($_POST['sell_description']))) {
    $_SESSION['main_error']="Proszę uzupełnić wszystkie pola!";
    header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
  } else {
    $sell_title=$_POST['sell_title'];
    $sell_address=$_POST['sell_address'];
    $sell_price=$_POST['sell_price'];
    $sell_description=$_POST['sell_description'];

    /* POPRAWNA NAZWA NIERUCHOMOSCI */
    if (strlen($sell_title)<3){
      $_SESSION['strlen_title_error'] = "Nazwa musi się składać z więcej niz 3 znakow";
      header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
    }

    /* POPRAWNY ADRES NIERUCHOMOSCI */
    if (strlen($sell_address)<5){
      $_SESSION['strlen_address_error'] = "Adres musi się składać z więcej niz 5 znakow";
      header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
    }

    /* POPRAWNA CENA NIERUCHOMOSCI */
    if (preg_match('/[a-zA-Z]/', $sell_price)){
      $_SESSION['not_numeric_price_error'] = "Cena musi być wartością liczbową";
      header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
    }

    /* POPRAWNY OPIS NIERUCHOMOSCI */
    if (strlen($sell_description)<15){
      $_SESSION['strlen_description_error'] = "Opis musi się składać z minimum 15 znakow";
      header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
    } else {
      require_once"../connect.php";
      $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
      if (mysqli_connect_errno()) {
        $_SESSION['connect_error'] = "<p>Nie mozna polaczyc sie z baza danych".mysqli_connect_errno."</p>";
        header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
        exit();
      } else {
        if ($result=mysqli_query($connect,"SELECT * FROM sell WHERE sell_title='$sell_title'")) {
          $row=mysqli_num_rows($result);
          if ($row>0) {
            $_SESSION['sell_exist_error'] = "Istnieje juz nieruchomosc o podanej nazwie!Wprowadź inną nazwę";
            header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
            exit();
          } else {
            if (mysqli_query($connect,"UPDATE sell SET sell_title='$sell_title', sell_address='$sell_address', sell_price='$sell_price', sell_description='$sell_description' WHERE id_sell='$_SESSION[id_sell]'")) {
              echo "Poprawnie edytowano rekord";
            } else {
              $_SESSION['cant_edit_sell'] = "Nie mozna edytowac rekordu. Przepraszamy";
              header('Location:edit_sell.php?id_sell='.$_SESSION[id_sell]);
              exit();
            }

          }
        }
    }
  }
}
}
 ?>

<?php
session_start();
$uploadDir = '../img_sell/';

if ((empty($_POST['sell_title'])) || (empty($_POST['sell_address'])) || (empty($_POST['sell_price'])) || (empty($_POST['sell_description']))) {
  $_SESSION['main_error']="Proszę uzupełnić wszystkie pola!";
  header('Location:add_sell.php');
} else {
  $sell_title=$_POST['sell_title'];
  $sell_address=$_POST['sell_address'];
  $sell_price=$_POST['sell_price'];
  $sell_description=$_POST['sell_description'];
  /* zmienn z FILE */
  $fileName = $_FILES['sell_img']['name'];
  $tmpName = $_FILES['sell_img']['tmp_name'];
  $fileSize = $_FILES['sell_img']['size'];
  $fileType = $_FILES['sell_img']['type'];

  $filePath = $uploadDir.$fileName;

  /* POPRAWNA NAZWA NIERUCHOMOSCI */
  if (strlen($sell_title)<3){
    $_SESSION['strlen_title_error'] = "Nazwa musi się składać z więcej niz 3 znakow";
    header('Location:add_sell.php');
  }

  /* POPRAWNY ADRES NIERUCHOMOSCI */
  if (strlen($sell_address)<5){
    $_SESSION['strlen_address_error'] = "Adres musi się składać z więcej niz 5 znakow";
    header('Location:add_sell.php');
  }

  /* POPRAWNA CENA NIERUCHOMOSCI */
  if (preg_match('/[a-zA-Z]/', $sell_price)){
    $_SESSION['not_numeric_price_error'] = "Cena musi być wartością liczbową";
    header('Location:add_sell.php');
  }

  /* POPRAWNY OPIS NIERUCHOMOSCI */
  if (strlen($sell_description)<15){
    $_SESSION['strlen_description_error'] = "Opis musi się składać z minimum 15 znakow";
    header('Location:add_sell.php');
  }else {
    require_once"../connect.php";
    $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
      $_SESSION['connect_error'] = "<p>Nie mozna polaczyc sie z baza danych".mysqli_connect_errno."</p>";
      header('Location:add_sell.php');
      exit();
    } else {
      if ($result=mysqli_query($connect,"SELECT * FROM sell WHERE sell_title='$sell_title'")) {
        $row=mysqli_num_rows($result);
        if ($row>0) {
          $_SESSION['sell_exist_error'] = "Istnieje juz nieruchomosc o podanej nazwie!Wprowadź inną nazwę";
          header('Location:add_sell.php');
          exit();
        }else {
          $result = move_uploaded_file($tmpName, $filePath);
          if (!$result) {
            echo "Nie udalo sie wczytac zdjecia";
          } else {
          mysqli_query($connect,"INSERT INTO sell VALUES (NULL, '$sell_title', '$sell_address', '$sell_price', '$sell_description')");
          $sell_current_id=mysqli_insert_id($connect);
          mysqli_query($connect,"INSERT INTO sell_img VALUES (NULL, '$fileName', '$filePath', '$sell_current_id')");
          $_SESSION['sell_add_correct'] = "Poprawnie dodano nieruchomosc do bazy";
          header('Location:add_sell.php');
          exit();
        }
      }
    }
  }
}
}



?>

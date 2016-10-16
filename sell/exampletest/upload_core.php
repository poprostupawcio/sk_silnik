<?php
$uploadDir = '../img_sell/';
if(isset($_POST['sell'])){
$fileName = $_FILES['sell_img']['name'];
$tmpName = $_FILES['sell_img']['tmp_name'];
$fileSize = $_FILES['sell_img']['size'];
$fileType = $_FILES['sell_img']['type'];

$filePath = $uploadDir.$fileName;
$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
  echo "Nie udalo sie wczytac foto";
} else {
  require_once"../connect.php";
  $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
  if (mysqli_connect_errno()) {
    $_SESSION['connect_error'] = "<p>Nie mozna polaczyc sie z baza danych".mysqli_connect_errno."</p>";
    header('Location:add_sell.php');
    exit();
  } else {
    mysqli_query($connect,"INSERT INTO sell_img VALUES (NULL, '$fileName', '$filePath')");

}
}
}
 ?>

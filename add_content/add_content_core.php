<?php
session_start();
if(empty($_POST['title']) || strlen($_POST['title'])<3) {
  $_SESSION['title_error'] = "Proszę podać tytuł. Musi on zawierać minimum 3 znaki";
  header('Location:add_content.php');
}
if(empty($_POST['text']) || strlen($_POST['text'])<25) {
  $_SESSION['text_error'] = "Proszę wpisać treść. Musi ona zawierać minimum 25 znakow";
  header('Location:add_content.php');
} else {
  $title = $_POST['title'];
  $text = $_POST['text'];
  $subpage_name = $_POST['subpage_name'];
  require_once "../connect.php";
  $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
  if (mysqli_connect_errno()) {
  echo "Nie udalo się polączyć z baza. Szczegoly:</br>".mysqli_connect_error();
  exit();
}else {
    if ($result=mysqli_query($connect,"SELECT id_subpage FROM subpages WHERE subpage_name='$subpage_name'")) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id_subpage=$row['id_subpage'];
    }
  }
  if ($result=mysqli_query($connect,"INSERT INTO content VALUE (NULL, '$title', '$text', '$subpage_name', '$id_subpage')")) {
    $_SESSION['correct']="Twoja tresc została dodana";
    header('Location:add_content.php');
}
}
}
?>

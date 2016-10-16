<?php
session_start();

if(empty($_POST['subpage_name']) || strlen($_POST['subpage_name'])<3) {
  $_SESSION['subpage_name_error'] = "Proszę podać tytuł. Musi on zawierać minimum 3 znaki";
  header('Location:add_subpage.php');
} else {
  $subpage_name = $_POST['subpage_name'];
  echo "<p>Twoja treść:</p>";
  echo "<p>".$subpage_name."</p>";

  require_once "../connect.php";
  $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
  if (mysqli_connect_errno()) {
    echo "<p> Nie udalo sie polaczyc z baza danych. Szczegoly:".mysqli_connect_errno()."</p>";
    exit();
  }else {
    if($result=mysqli_query($connect,"SELECT * FROM subpages WHERE subpage_name='$subpage_name'")) {
      $row=mysqli_num_rows($result);
      if ($row>0) {
      $_SESSION['subpage_exist_error'] = "Istnieje juz podstrona o tej nazwie";
      header('Location:add_subpage.php');
      exit();
    } else
    mysqli_query($connect,"INSERT INTO subpages VALUE (NULL, '$subpage_name')");
    header('Location:page_list.php');
  }
}
}

?>

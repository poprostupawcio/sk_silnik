<?php
  session_start();

  if (!isset($_POST['send_review'])) {
    header('Location: add_review.php');
    exit();
  } else {
    if (empty($_POST['sender']) || empty($_POST['review'])) { // Sprawdzone czy wszystkie pola są uzupełnione
      $_SESSION['empty_field'] = "Wszystkie pola muszą być uzupełnione!";
      header('Location:add_review.php');
      exit();
    } else {
      $sender = $_POST['sender'];
      $review = $_POST['review'];

      if (strlen($sender)<=3) {
        $_SESSION['sender_too_short'] = "Te pole musi się składać z minimum 4 znakow";
        header('Location:add_review.php');
      }

      if (strlen($review)<10) {
        $_SESSION['review_too_short'] = "Te pole musi się składać z minimum 10 znakow";
        header('Location:add_review.php');
      }
    }
  }
 ?>

<?php

session_start();

			require_once "../connect.php";
			$connect = new mysqli($host, $db_user, $db_password, $db_name);
			$id=$_GET['id_sell'];
      $connect->query("DELETE FROM sell WHERE id_sell=$id") ;
      $connect->query("DELETE FROM img_sell WHERE id_sell=$id");
			header('Location:sell_list.php');

	?>

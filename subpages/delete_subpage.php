<?php

session_start();

			require_once "../connect.php";
			$connect = new mysqli($host, $db_user, $db_password, $db_name);
			$id=$_GET['id_subpage'];
      $connect->query("DELETE FROM subpages WHERE id_subpage=$id") ;
      $connect->query("DELETE FROM content WHERE id_subpage=$id");
			header('Location:page_list.php');

	?>

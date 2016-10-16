
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../css/style.css" media="screen" title="no title">
  </head>
  <body>

    <?php
    session_start();
    $_SESSION['id_sell'] = $_GET['id_sell'];
    require_once'../connect.php';
    $connect=mysqli_connect($host, $db_user, $db_password, $db_name) ;
    if (mysqli_connect_errno()) {
      echo "<p>Nie udalo sie polaczyc z baza. Szcegoly:".mysqli_connect_errno()."</p>";
    }
    if ($result=mysqli_query($connect,"SELECT * FROM sell WHERE id_sell='$_SESSION[id_sell]'")) {
      while($row=mysqli_fetch_assoc($result)) {
        echo "<h1> Edytuj dane o nieruchomości ".$row['sell_title']."</h1>";
        if (isset($_SESSION['main_error'])) {
          echo "<p style='color:red'>".$_SESSION['main_error']."</p>";
          unset($_SESSION['main_error']);
        }
        if (isset($_SESSION['connect_error'])) {
          echo "<p style='color:red'>".$_SESSION['connect_error']."</p>";
          unset($_SESSION['connect_error']);
        }
        if (isset($_SESSION['cant_edit_sell'])) {
          echo "<p style='color:red'>".$_SESSION['cant_edit_sell']."</p>";
          unset($_SESSION['cant_edit_sell']);
        }

        echo "<form method='POST' action='edit_sell_core.php'>";
        echo "<label>Nazwa nieruchomosci: <input type='text' name='sell_title' placeholder='".$row['sell_title']."'></label>";
        if (isset($_SESSION['strlen_title_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_title_error']."</p>";
          unset($_SESSION['strlen_title_error']);
          }
        if (isset($_SESSION['sell_exist_error'])) {
            echo "<p style='color:red;'>".$_SESSION['sell_exist_error']."</p>";
            unset($_SESSION['sell_exist_error']);
            }
        echo "<label>Adres: <input type='text' name='sell_address' placeholder='".$row['sell_address']."'></label>";
        if (isset($_SESSION['strlen_address_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_address_error']."</p>";
          unset($_SESSION['strlen_address_error']);
          }
        echo "<label>Cena nieruchomosci: <input type='text' name='sell_price' placeholder='".$row['sell_price']."'></label>";
        if (isset($_SESSION['not_numeric_price_error'])) {
          echo "<p style='color:red;'>".$_SESSION['not_numeric_price_error']."</p>";
          unset($_SESSION['not_numeric_price_error']);
          }
        echo "<label>Opis: </br><textarea cols='45' rows='15' name='sell_description' placeholder='".$row['sell_description']."'></textarea>";
        if (isset($_SESSION['strlen_description_error'])) {
          echo "<p style='color:red;'>".$_SESSION['strlen_description_error']."</p>";
          unset($_SESSION['strlen_description_error']);
          }
        echo "<input type='submit' value='EDYTUJ' name='send'>";

      }
    }

     ?>
  </body>
</html>

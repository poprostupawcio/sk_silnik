<?php
  session_start();
  include 'header.php';
  if (isset($_SESSION['correct'])) {
  echo "<p>".$_SESSION['correct']."</p>";
  unset($_SESSION['correct']);
  }
 ?>

  <form method="post" action="add_content_core.php">
    <input type="text" placeholder="Tytuł" name="title"/>
    <!-- obsługa błędow -->
    <?php
    if (isset($_SESSION['title_error'])) {
      echo "<p>".$_SESSION['title_error']."</p>";
      unset($_SESSION['title_error']);
    }
    ?>
    <textarea placeholder="Tresć" name="text" maxlength="1000" cols="36" rows="5"></textarea>
    <!-- obsługa błędow -->
    <?php
    if (isset($_SESSION['text_error'])) {
      echo "<p>".$_SESSION['text_error']."</p>";
      unset($_SESSION['text_error']);
    }
    ?>
    <select name="subpage_name">
      <!-- Pobieranie podstorn z bazy -->
        <?php
        require_once "../connect.php";
        $connect = mysqli_connect($host, $db_user, $db_password, $db_name) ;
        if (mysqli_connect_errno()) {
          echo "<p style='color:red'>Nie udalo sie polaczayc z baza danych. Szczegoly:".mysqli_connect_errno()."</p>";
          exit();
        } else {
          if ($result=mysqli_query($connect,"SELECT * FROM subpages"))
          while ($row=mysqli_fetch_assoc($result)) {
            echo "<option>".$row['subpage_name']."</option>";
          }
           }
        ?>

    </select>

    <input type="submit" value="Wyślij" name="wyslij" />
  </form>
  <a href="../subpages/add_subpage.php">Dodaj podstronę </a>

  </body>
</html>

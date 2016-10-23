<?php
  include 'header.php';
  session_start();

  if (isset($_SESSION['sign_in'])) {
    echo "<p>Witaj ".$_SESSION['user']."|<a href='user/logout.php'>WYLOGUJ SIE</a></p>";
  }
?>

  </body>
</html>

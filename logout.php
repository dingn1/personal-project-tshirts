<html>
  <head>
    <meta http-equiv="refresh" content="1;url=loginindex.php">
  </head>
</html>
<?php
  session_start();
  $_SESSION['username']=0;
  session_destroy();
  echo "You have been logged out. <a href='loginindex.php'>Return to Login</a>";
?>

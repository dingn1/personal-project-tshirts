<?php
  SESSION_start();
  if(isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
  } else {
  }
  $connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");
  mysql_select_db( "tryon") or die("Unable to select database");
  $result = MYSQL_QUERY("select name from tryon where username='$username'");
  $name = @MYSQL_RESULT($result,0, "name");

  mysql_select_db( "product") or die("Unable to select database");
  $result1=mysql_query("SELECT bin_data ,filetype FROM product where name='$name'") or die("Can't Perform Query");
  $data = @MYSQL_RESULT($result1,0, "bin_data");
  $type = @MYSQL_RESULT($result1,0, "filetype");
  Header( "Content-type: $type");
  echo"$data";
?>

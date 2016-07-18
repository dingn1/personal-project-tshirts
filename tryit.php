<html>
  <head>
    <meta http-equiv="refresh" content="1;url=tryon.php">
  </head>
</html>
 <?php
  if(isset($_GET['namec'])) {
    $name=$_GET['namec'];
    session_start();

    if(isset($_SESSION['username'])) {
      $username=$_SESSION['username'];
    } else {
      header("location:loginindex.php");
    }

    $connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");
    mysql_select_db( "tryon") or die("Unable to select database");
    $result=MYSQL_QUERY("select name from tryon where username='$username'");
    $numrows = mysql_num_rows($result);

    if($numrows==0) {
      $result1 = MYSQL_QUERY("insert into tryon (name,username) values('$name','$username')");
    } else {
      $result1 = MYSQL_QUERY("update tryon set name='$name' where username ='$username'");
    }
    echo   '<img src="try2.php"><br>';
    echo   "$name<br>";
    echo   '<a href="tryon.php">try on</a>';
  }
?>

<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>login</title>
  </head>

	<body>
		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>
      <div id="content">

      </div>

      <?php include('includes/footer.php'); ?>
		</div> <!-- End #wrapper -->
	</body>
</html>

<?php
  session_start();
  $username=isset($_POST["username"])?$_POST["username"]:"";
  $password=isset($_POST["password"])?$_POST["password"]:"";

  if($username&&$password) {
    $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
    mysql_select_db("login") or die ("Couldnt find database");
    $query = mysql_query("SELECT * FROM users WHERE username='$username'");
    $numrows = mysql_num_rows($query);
    if($numrows != 0) {
      while($row = mysql_fetch_assoc($query)) {
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
        $dbid=$row['id'];
      }
      if($username == $dbusername&&$password == $dbpassword) {
        $_SESSION['username']=$dbusername;
        $_SESSION['id']=$dbid;
        header ("location: index.php");
      } else {
        echo "Incorrect password";
      }
    } else {
      die ("That username doesnt exist");
    }
  } else {
    die("Please enter a username and password");
  }
?>

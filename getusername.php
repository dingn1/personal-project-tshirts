<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

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
  $emailaddress=isset($_POST["emailaddress"])?$_POST["emailaddress"]:"";

  if($emailaddress) {
    $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
    mysql_select_db("login") or die ("Couldnt find database");
    $query = mysql_query("SELECT * FROM users WHERE emailaddress='$emailaddress'");
    $numrows = mysql_num_rows($query);
    if($numrows != 0) {
      while($row = mysql_fetch_assoc($query)) {
        $dbemailaddress = $row['emailaddress'];
        $dbpassword = $row['password'];
      }
        $_SESSION['password']=$dbpassword;
        header ("location: questionindex.php");
    } else {
      die ("That email address doesnt exist");
    }
  } else {
    die("Please enter a email address.");
  }
?>

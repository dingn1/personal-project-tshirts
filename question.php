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
        <?php include('includes/footer.php'); ?>
      </div>
		</div> <!-- End #wrapper -->
	</body>
</html>


<?php
  session_start();
  $securequestion=$_POST["securequestion"];
  $answer=$_POST["answer"];

  if($securequestion&&$answer) {
    $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
    mysql_select_db("login") or die ("Couldnt find database");
    $query = mysql_query("SELECT * FROM users WHERE securequestion='$securequestion' and answer='$answer'");
    $numrows = mysql_num_rows($query);
    if($numrows != 0) {
      while($row = mysql_fetch_assoc($query)) {
        $dbsecurequestion = $row['securequestion'];
        $dbanswer = $row['answer'];
        $dbid=$row['id'];
        $username=$row['username'];
        $password=$row['password'];
      }
      if($securequestion == $dbsecurequestion&&$answer == $dbanswer) {
        echo "Successful. Your password is:".$password;
        echo "your username is:".$username;
      } else {
        echo "Incorrect answer";
      }
    }
  } else {
    die("Please enter an  answer");
  }
?>

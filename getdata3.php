<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>Youraccount</title>
  </head>

	<body>

		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php
        session_start();
        if(isset($_SESSION['username'])) {
          include('includes/nav2.php');
          echo "<div class='info'>";
          echo "You are logged in as: ".$_SESSION['username'];
          echo "<p>";
          echo "<a href='logout.php'>Click here to logout</a>";
          echo "</div>";
        } else {
          header ("location: loginindex.php");
        }
      ?>
      <div id="content">
        <?php
          $username=$_SESSION['username'];
          $connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");
          mysql_select_db( "login") or die("Unable to select database");
          $result=mysql_query("SELECT ID FROM image where username ='$username'") or die("Can't Perform Query");
          While ($row=mysql_fetch_row($result)) {
            echo "<img src=\"getdata.php?id=$row[0]\">T-shirt<br>";
          }
        ?>
      </div> <!-- end #content -->
      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->

	</body>
</html>

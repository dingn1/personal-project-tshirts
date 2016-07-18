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
          $username=$_SESSION['username'];
        }
        else {
          header("location: loginindex.php");
        }
      ?>
      <div id="content">
        <?php
          $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
          mysql_select_db("login") or die ("Couldnt find database");
          $query = mysql_query("SELECT * FROM users WHERE username='$username'");
          while($row = mysql_fetch_assoc($query)) {
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
            $email=$row['emailaddress'];
          }
          echo"your email address is $email";
        ?>
        <br>
        <?php
          $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
          mysql_select_db("shopping") or die ("Couldnt find database");
          $query = mysql_query("SELECT * FROM shopping WHERE username='$username'");
          $numrows =mysql_num_rows($query);
          if($numrows == 0) {
            header("location:account.php");
          } else {
            header("location:shoppingaccount.php");
          }
        ?>
        <br>
        <a href="recent.php">recent viewed T-shirts</a>
        <h1></h1>

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>

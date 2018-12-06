<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>Add to wishlist</title>
  </head>

	<body>
		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php
        session_start();
        if (isset($_SESSION['username'])) {
            include('includes/nav2.php');
            echo "<div class='info'>";
            echo "You are logged in as: ".$_SESSION['username'];
            echo "<p>";
            echo "<a href='logout.php'>Click here to logout</a>";
            echo "</div>";
            $username=$_SESSION['username'];
        } else {
            header("location: loginindex.php");
        }
      ?>
      <div id="content">
        <?php
          $name=$_GET["nameb"];
          $connect = mysql_connect('localhost', 'root', '') or die('Couldnt connect to database');
          mysql_select_db('wishlist') or die('Couldnt find database');
          $query = mysql_query("SELECT * FROM wishlist WHERE name='$name'&& username='$username'");
          $numrows = mysql_num_rows($query);
          if ($numrows != 0) {
              header("location: wishlist.php");
          } else {
              $query = "INSERT INTO wishlist (name,username) VALUES('$name','$username')";
              if ($query_run = mysql_query($query)) {
                  header("location: wishlist.php");
              } else {
                  echo "Sorry we can not add it to wishlist. Try again later.";
              }
          }
        ?>
      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>

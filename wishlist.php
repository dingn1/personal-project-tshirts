<!DOCTYPE html>

<html>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>Wishlist</title>
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
          $connect = mysql_connect('localhost', 'root', '') or die('Couldnt connect to database');
          mysql_select_db('wishlist') or die('Couldnt find database');
          $query = mysql_query("SELECT * FROM wishlist WHERE username='$username'")or die("Can't Perform Query");
          $numrows = mysql_num_rows($query);
          if ($numrows != 0) {
              while ($row=mysql_fetch_row($query)) {
                  $name=$row[2];
                  mysql_select_db('product') or die('Couldnt find database');
                  $result = mysql_query("SELECT id FROM product WHERE name='$name'")or die("Can't Perform Query");
                  while ($rowb=mysql_fetch_row($result)) {
                      echo"<div class='img'>";
                      echo"<a href=\"product.php?name=$row[2]\">";
                      echo "<img src=\"getdata2.php?id=$rowb[0]\"><br>";
                      echo"</a><br>";
                      echo "<a href=\"product.php?name=$row[2]\">$name</a><br>";
                      echo "<a href=\"delete.php?nameb=$row[2]\">delete from wishlist</a><br>";
                      echo"</div>";
                  }
              }
          }
        ?>
      </div>
      <?php include('includes/sidebar.php'); ?>
      <div id="content">
        <br>
        <p></p>
        <p></p>
        <h1></h1>
        <a href="recent.php">recent viewed T-shirts</a>
        <h1></h1>

      </div> <!-- end #content -->

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->

	</body>
</html>

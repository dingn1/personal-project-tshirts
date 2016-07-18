<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>T-shirts Spring Index</title>
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
          include('includes/nav.php');
          echo"Please log in.";
        }
      ?>

      <div id="content">
        <h1>T-shirts on sale</h1>
        <?php
          $connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");
          mysql_select_db( "product") or die("Unable to select database");
          $favor=1;
          while($favor<=10) {
            $result=mysql_query("SELECT id ,name FROM product where favor ='$favor'") or die("Can't Perform Query");
            while ($row=mysql_fetch_row($result)) {
              echo"<div class='img'>";
              echo"<a href=\"product.php?name=$row[1]\">";
              echo "<img src=\"getdata2.php?id=$row[0]\"><br>";
              echo"</a>";
              $name=$row[1];
              echo "<a href=\"product.php?name=$row[1]\">$name</a><br>";
              echo"</div>";
            }
            $favor++;
          }
        ?>
      </div>
      <?php include('includes/sidebar.php'); ?>
      <div id="content">
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

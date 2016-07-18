<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>Product</title>
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
        <?php
          if(isset($_GET['name'])) {
            $name=$_GET['name'];
            $connect = MYSQL_CONNECT( "localhost", "root", "") or die("Unable to connect to MySQL server");
            mysql_select_db( "product") or die("Unable to select database");
            $result=mysql_query("SELECT id ,description FROM product where name='$name'") or die("Can't Perform Query");
            While ($row=mysql_fetch_row($result)){
            echo "<img src=\"getdata2.php?id=$row[0]\"><br><br>";
            $description=$row[1];
            echo"$description";
          }
          echo "<br><a href=\"add.php?nameb=$name\">add $name to wish list</a><br>";}
        ?>

        <h1></h1>
        <a href="recent.php">recent viewed T-shirts</a>
        <h1></h1>
        <h1></h1>
        <?php echo"<a href=\"tryit.php?namec=$name\">try on system</a>";?>
        <h1></h1>
      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>
		</div> <!-- End #wrapper -->
	</body>
</html>

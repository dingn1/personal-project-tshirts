<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>About</title>
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
        } else {
            include('includes/nav.php');
            echo"Please log in.";
        }
      ?>

      <div id="content">

        <h3>About: <br>Virtual Dressing Room</h3>

        <p>Developed by: <br><br>Cheng Wu<br>Ning Ding<br>Qiaoyu Zhu<br>Qian Wang</p>

        <p>version: 1.00</p>

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->

	</body>
</html>

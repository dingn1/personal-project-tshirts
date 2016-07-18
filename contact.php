<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>Contact us</title>
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
        }
      ?>

      <div id="content">
        <h3>Contact Us</h3>

        <p>Cheng Wu: cwu@stevens.edu</p>

        <p>Ning Ding: nding@stevens.edu</p>

        <p>Qiaoyu Zhu: qzhu3@stevens.edu</p>

        <p>Qian Wang: qwang15@stevens.edu</p>

        <p>Stevens Institute of Technology</p>
      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>

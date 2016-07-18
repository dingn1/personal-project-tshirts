<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>Recent</title>
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
          echo "<a href='logout.php'>Click here to lgout</a>";
          echo "</div>";
        } else {
          include('includes/nav.php');
          echo "please log in.";
        }
      ?>

      <div id="content">
        <?php include('includes/footer.php'); ?>
      </div> <!-- end #content -->
		</div> <!-- End #wrapper -->
	</body>
</html>

<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>Forget</title>
  </head>

	<body>

		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>

      <div id="content">
        <form action="password.php" method= "POST" >
          username:<input type ="text" name="username" /><br /><br />
          <input type="submit" name="submit" value="continue" />
        </form>
      </div> <!-- end #content -->
      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->

	</body>

</html>

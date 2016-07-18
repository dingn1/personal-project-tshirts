<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>login</title>
  </head>

	<body>
		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>

      <form action="login.php" method= "POST" >
        username:<input type ="username" name="username" ><br /><br />
        password:<input type ="password" name="password" ><br /><br />
        <input type= "submit" name= "submit" value="login" >
      </form>
      <div id="content">
        <a href="Forget.php">Forget Password</a>
        <a href="username.php">Forget Username</a>

        <?php include('includes/footer.php'); ?>
      </div>
		</div> <!-- End #wrapper -->
	</body>
</html>

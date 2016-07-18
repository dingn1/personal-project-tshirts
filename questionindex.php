<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>login</title>
  </head>

	<body>
		<div id="wrapper">
      <?php include('includes/header.php'); ?>

      <?php include('includes/nav.php'); ?>
      <form action="question.php" method= "POST" >
        securequestion:<input type ="securequestion" name="securequestion" ><br /><br />
        answer:<input type ="answer" name="answer" ><br /><br />
        <input type= "submit" name= "submit" value="continue" >
      </form>
      <div id="content">
        <?php include('includes/footer.php'); ?>
      </div>
		</div> <!-- End #wrapper -->
	</body>
</html>

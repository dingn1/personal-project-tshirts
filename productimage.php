<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>ProductImage</title>
  </head>

	<body>
		<div id="wrapper">
      <?php include('includes/header.php'); ?>
      <?php include('includes/nav2.php'); ?>
      <?php
      session_start();
      if (isset($_SESSION['username'])&&$_SESSION['username']=="dingn1") {
          echo "<div class='info'>";
          echo "You are logged in as: ".$_SESSION['username'];
          echo "<p>";
          echo "<a href='logout.php'>Click here to lgout</a>";
          echo "</div>";
      } elseif (isset($_SESSION['username'])&&$_SESSION['username']!="dingn1") {
          header("location: youraccount.php");
      } else {
          header("location: loginindex.php");
      }

      if (isset($_POST['submit'])) {
          $form_description = $_POST['form_description'];

          $form_name = $_POST['name'];

          $favor=$_POST['favor'];

          $form_data_name = $_FILES['form_data']['name'];

          $form_data_size = $_FILES['form_data']['size'];

          $form_data_type = $_FILES['form_data']['type'];

          $form_data = $_FILES['form_data']['tmp_name'];

          $connect = MYSQL_CONNECT('localhost', 'root', '') or die('Unable to connect to MySQL server');

          mysql_select_db('product') or die('Unable to select database');

          $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

          //echo "mysqlPicture=".$data;

          $result=MYSQL_QUERY("INSERT INTO product (description,bin_data,filename,filesize,filetype,name,favor) VALUES ('$form_description','$data','$form_data_name','$form_data_size','$form_data_type','$form_name','$favor')");

          $id= mysql_insert_id();

          print "<p>This file has the following Database ID: <a href='getdata3.php'>abc</a>";

          MYSQL_CLOSE();
      } else {
          ?>

      <center>

        <form method="post" action="productimage.php" enctype="multipart/form-data">

          File Description:
          <input type="text" name="form_description" size="154"><br>
          name:<input type="text" name="name" size="40"><br>
          favor:<input type="text" name="favor" size="11"><br>
          <INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="1000000"> <br>

          File to upload/store in database:

          <input type="file" name="form_data" size="40">

          <p><input type="submit" name="submit" value="submit">

        </form>

      </center>

      <?php
      }

      ?>

      <div id="content">

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>
      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->

	</body>
</html>

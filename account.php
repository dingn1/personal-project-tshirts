<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style/style.css" media="screen" />

    <title>Youraccount</title>
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
          $username=$_SESSION['username'];
        } else {
          header ("location: loginindex.php");
        }
      ?>
      <div id="content">
        <?php
          if(isset($_POST['address'])&&isset($_POST['mobile'])&&isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['zip'])) {
            $zip=$_POST['zip'];
            $address = $_POST['address'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $name = $_POST['name'];
            $mobile=$_POST['mobile'];
            $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
            mysql_select_db("shopping") or die ("Couldnt find database");
            if(!empty($address)&&!empty($mobile)&&!empty($email)&&!empty($name)&&!empty($zip)) {
              $query = "INSERT INTO shopping (zipcode, address, mobile, name, email,username) VALUES( '$zip', '$address', '$mobile', '$name', '$email','$username')";
              if($query_run = mysql_query($query)) {
                header('Location: youraccount.php');

              } else {
                echo 'Sorry, we couldn\'t add your information at this time. Try again later.';
              }
            } else {
              echo 'All fields are required.';
            }
          } else {
            $username = '';
            $password = '';
            $password_again = '';
            $securequestion = '';
            $answer = '';
            $emailaddress = '';
            $name = '';
          }
        ?>
        <br>
        <form action="account.php" method= "POST" >
          Enter address:<input type="text" name="address"></br></br>
          Enter phone number:<input type ="text" name="mobile"></br></br>
          Enter emailaddress:<input type ="text" name="email" ></br></br>
          Enter your name:<input type ="text" name="name"></br></br>
          Enter your ZIP code:<input type ="text" name="zip"></br></br>
          <input type= "submit" name= "submit" value="add" >
        </form>

      </div> <!-- end #content -->

      <?php include('includes/sidebar.php'); ?>

      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>

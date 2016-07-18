<!DOCTYPE html>

<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <meta name="author" content="" />

    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

    <title>Register</title>
  </head>

	<body>

		<div id="wrapper">

    <?php include('includes/header.php'); ?>

    <?php include('includes/nav.php'); ?>
    <p>

      <?php
        require 'core.inc.php';

        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['securequestion'])&&isset($_POST['answer'])&&isset($_POST['emailaddress'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $password_again = $_POST['password_again'];
          $password_hash = md5($password);
          $securequestion = $_POST['securequestion'];
          $answer = $_POST['answer'];
          $emailaddress = $_POST['emailaddress'];
          $name = $_POST['name'];
          $connect = mysql_connect("127.0.0.1","root","") or die("Couldnt connect to database");
          mysql_select_db("login") or die ("Couldnt find database");
          if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($securequestion)&&!empty($answer)&&!empty($emailaddress)&&!empty($name)){
              if($password!=$password_again) {
                  echo 'Passwords do not match.';
              }else{
                $query1 = "SELECT emailaddress FROM users WHERE emailaddress = '$emailaddress'";
                $query = "SELECT username FROM users WHERE username = '$username'";
                $query_run = mysql_query($query);
                $query1_run = mysql_query($query1);

                if(mysql_num_rows($query_run)!=0||mysql_num_rows($query1_run)!=0) {

                  echo 'The username '.$username.' already exists.';
                } else {
                  $query = "INSERT INTO users (password, username, securequestion, answer, name, emailaddress) VALUES('$password', '$username', '$securequestion', '$answer', '$name', '$emailaddress')";
                  if($query_run = mysql_query($query)){
                    $_SESSION['username']=$username;
                    header('Location: index.php');

                  } else {
                    echo 'Sorry, we couldn\'t register you at this time. Try again later.';
                  }
                }
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
        <form action="register.php" method= "POST" >
          Create username:<input type ="username" name="username" value="<?php echo $username; ?>"><br /><br />
          Create password:<input type ="password" name="password" ><br /><br />
          Password again:<input type ="password" name="password_again" ><br /><br />
          Enter securequestion:<input type="securequestion" name="securequestion" value="<?php echo $securequestion; ?>"></br></br>
          Enter answer:<input type ="answer" name="answer" value="<?php echo $answer; ?>"></br></br>
          Enter emailaddress:<input type ="emailaddress" name="emailaddress" value="<?php echo $emailaddress; ?>"></br></br>
          Enter your name:<input type ="name" name="name" value="<?php echo $name; ?>"></br></br>
          <input type= "submit" name= "submit" value="register" >
        </form>
      </p>
      <div id="content">

      </div> <!-- end #content -->
      <?php include('includes/footer.php'); ?>

		</div> <!-- End #wrapper -->
	</body>
</html>

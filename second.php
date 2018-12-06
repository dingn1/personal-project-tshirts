<?php
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $connect = MYSQL_CONNECT('localhost', 'root', '') or die('Unable to connect to MySQL server');
      mysql_select_db('login') or die('Unable to select database');
      $query = "select bin_data,filetype from image where id=$id";
      $result = MYSQL_QUERY($query);
      $numrows = mysql_num_rows($result);
      if ($numrows != 0){
          while ($row = mysql_fetch_row($result)) {
              $type =$row[1];
              $data=$row[0];
              Header("Content-type: $type");
              echo $data;
          }
      }
  }
?>

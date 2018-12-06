<?php
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $connect = MYSQL_CONNECT('localhost', 'root', '') or die('Unable to connect to MySQL server');
    mysql_select_db('product') or die('Unable to select database');
    $query = "select bin_data,filetype from product where id=$id";
    $result = @MYSQL_QUERY($query);
    $data = @MYSQL_RESULT($result,0, "bin_data");
    $type = @MYSQL_RESULT($result,0, "filetype");
    Header("Content-type: $type");
    echo $data;
  }
?>

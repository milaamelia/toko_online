<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "db_ibazaar";

  $conn = mysqli_connect($host, $user, $password) or die ("Cannot connect database");
  mysqli_select_db($conn, $database);
?>
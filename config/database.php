<?php
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "php_crud_activity";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
      die("Database Connection Failed: " . $conn->connect_error);
  }
?>
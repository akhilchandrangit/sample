<?php
  $username = "root";
  $password = "root";
  $database = "demo";
  $conn = new mysqli("localhost", $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>

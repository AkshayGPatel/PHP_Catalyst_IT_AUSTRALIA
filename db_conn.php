<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userlist";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) !== TRUE) {
  echo "Error creating database: " . $conn->error;
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  UNIQUE KEY unique_email (email)
);";
  
  if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
  }

?>
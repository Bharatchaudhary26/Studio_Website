<?php
$servername ="localhost";
$username = "root";
$password = "";
$database = "arbuda_studio";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>

<!-- error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0); -->
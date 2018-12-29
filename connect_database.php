<?php
$servername = "localhost";
$username   = "root";
$password   = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"web_dev_test2");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smart_will";

// Create connection
$conn = new mysqli("localhost", "root", "", "smart_will");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
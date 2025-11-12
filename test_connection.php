<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "feedback_db"; // change this to your database name

// Create connection
$conn = new mysqli("localhost", "root", "", "feedback_db");


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to database: " . $database;
?>

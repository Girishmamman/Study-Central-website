<?php
// Show all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "feedback_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
$sql = "INSERT INTO feedback (name, email, message)
        VALUES ('Test User', 'test@example.com', 'This is a test message')";

if ($conn->query($sql) === TRUE) {
    echo "New record inserted successfully!";
} else {
    echo " Error: " . $conn->error;
}

// Close connection
$conn->close();
?>

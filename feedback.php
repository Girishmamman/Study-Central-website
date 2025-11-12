<?php
// Database connection setup
$servername = "localhost";
$username = "root"; // Default for XAMPP
$password = "";     // Default password is blank
$database = "feedback_db"; // Change this to your database name

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start POST check
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1️⃣ Collect inputs safely
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // 2️⃣ Validate inputs
    if ($name && $email && $message) {

        // 3️⃣ Prepare and execute query
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        if ($stmt->execute()) {
            echo "<h2>Thank you, $name!</h2>";
            echo "<p>Your feedback has been submitted successfully.</p>";
            echo "<a href='index.html'>Back to Home</a>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

    } else {
        // 4️⃣ Show warning if fields are empty
        echo "⚠ Please fill in all fields!";
    }

} // ✅ Close the POST check here

$conn->close();
?>

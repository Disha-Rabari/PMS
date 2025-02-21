<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "PMS";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mark all notifications as read
$conn->query("UPDATE notifications SET is_read = 1 WHERE is_read = 0");

echo json_encode(["success" => true]);

$conn->close();
?>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PMS";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST request has required parameters
if (isset($_POST['task']) && isset($_POST['status'])) {
    $task_id = intval($_POST['task']); // Ensure task_id is an integer
    $new_status = $conn->real_escape_string($_POST['status']); // Sanitize input

    // Update query
    $sql = "UPDATE task SET status='$new_status' WHERE id=$task_id";

    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close connection
$conn->close();
?>

<?php
$servername = "localhost";
$username = "root"; // Change this as per your DB
$password = "";
$dbname = "PMS";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch unread notifications
$sql = "SELECT * FROM notifications WHERE is_read = 0 ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
while ($row = $result->fetch_assoc()) {
    $notifications[] = $row;
}

// Count unread notifications
$count = count($notifications);

$response = [
    "notifications" => $notifications,
    "count" => $count
];

echo json_encode($response);

$conn->close();

?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "PMS";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, status, progress FROM tasks";
$result = $conn->query($sql);
$tasks = [];
$completed = $inProgress = $pending = 0;

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row;
        if ($row['status'] === 'Completed') {
            $completed++;
        } elseif ($row['status'] === 'In Progress') {
            $inProgress++;
        } else {
            $pending++;
        }
    }
}


?>
<?php
// Set content type to plain text
header('Content-Type: text/plain');

// Database connection
$mysqli = new mysqli("localhost", "root", "", "robot_arm_position");

// Check connection
if ($mysqli->connect_error) {
    http_response_code(500);
    echo "Error: Database connection failed.";
    exit;
}

// Update the status to 0
$sql = "UPDATE run SET status = 0";

if ($mysqli->query($sql) === TRUE) {
    echo "Status updated to 0 successfully.";
} else {
    echo "Error updating status: " . $mysqli->error;
}

$mysqli->close();
?>

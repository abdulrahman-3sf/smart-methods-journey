<?php
header('Content-Type: text/plain');

// Database connection
$mysqli = new mysqli("localhost", "root", "", "robot_arm_position");

if ($mysqli->connect_error) {
    http_response_code(500);
    echo "Error: Database connection failed.";
    exit;
}

// Get the row from run table
$result = $mysqli->query("SELECT status, servo1, servo2, servo3, servo4, servo5, servo6 FROM run LIMIT 1");

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Format: status,s1value,s2value,...,s6value
    $output = $row['status'] .
        ',s1' . $row['servo1'] .
        ',s2' . $row['servo2'] .
        ',s3' . $row['servo3'] .
        ',s4' . $row['servo4'] .
        ',s5' . $row['servo5'] .
        ',s6' . $row['servo6'];

    echo $output;
} else {
    echo "No data";
}

$mysqli->close();
?>

<?php
/**
 * This script loads events from the database and returns them in JSON format.
 * It connects to the database, fetches the events, and encodes them as JSON.
 */
$host = "localhost";
$user = "root";
$password = "";
$db = "studentmanagement";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT * FROM class_schedule";
$result = $conn->query($query);

$events = array();
while ($row = $result->fetch_assoc()) {
    $event = array();
    $event['title'] = $row['class_name'];
    $event['start'] = $row['start_time'];
    $event['end'] = $row['end_time'];
    $event['description'] = $row['description'];
    $events[] = $event;
}

echo json_encode($events);

$conn->close();
?>

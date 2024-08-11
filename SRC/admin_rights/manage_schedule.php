<?php
/**
 * This script handles the scheduling of classes for a specific batch.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database and retrieves the form data submitted by the user.
 * The script checks for any scheduling conflicts with existing classes.
 * If no conflicts are found, it inserts the new class schedule into the database.
 * Finally, it redirects the user back to the class schedule management page.
 */
session_start();
if (!isset($_SESSION['username'])) {
    header("location:../log_main/login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "studentmanagement";
$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$batch_id = $_POST['batch_id'];
$class_name = $_POST['class_name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$description = $_POST['description'];

// Check for conflicts
$conflict_query = "SELECT * FROM class_schedule WHERE batch_id = ? AND (start_time < ? AND end_time > ?)";
$stmt = $conn->prepare($conflict_query);
$stmt->bind_param("iss", $batch_id, $end_time, $start_time);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Conflict detected! Please choose a different time slot.";
    exit();
}

$query = "INSERT INTO class_schedule (batch_id, class_name, start_time, end_time, description) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("issss", $batch_id, $class_name, $start_time, $end_time, $description);

if ($stmt->execute()) {
    echo "Class scheduled successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("location:admin_schedule.php");
?>

<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['username'])) {
    header("location:../log_main/login.php");
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $batch_name = $_POST['batch_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $capacity = $_POST['capacity'];

    // Establish database connection
    $conn = new mysqli('localhost', 'root', '', 'studentmanagement');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO batches (batch_name, start_date, end_date, capacity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $batch_name, $start_date, $end_date, $capacity);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "Batch created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Batch</title>
    <link rel="stylesheet" type="text/css" href="../style_css_main/admin_style/create_batch.css">
</head>
<body>
    <header class="header">
        <a href="adminhome.php">Admin Dashboard</a>
        <div class="logout">
            <a href="../log_main/logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>
    
    <div class="content">
        <h2>Create New Batch</h2>
        <form action="create_batch.php" method="post">
            <label for="batch_name">Batch Name:</label>
            <input type="text" id="batch_name" name="batch_name" required><br><br>
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required><br><br>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required><br><br>
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" required><br><br>
            <input type="submit" value="Create Batch">
        </form>
    </div>
</body>
</html>

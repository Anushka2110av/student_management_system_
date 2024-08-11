<?php
/**
 * This script handles the class schedule management for the admin.
 * It starts by checking if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database and fetches all batches.
 * The fetched batches are used to populate a dropdown menu in the HTML form,
 * which allows the admin to create and manage class schedules.
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

$batches_result = $conn->query("SELECT * FROM batches");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Schedule Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style_css_main/admin_style/view_classes.css">
</head>
<body>
<header class="header">
    <a href="adminhome.php">Admin Dashboard</a>
    <div class="logout">
        <a href="../log_main/logout.php" class="btn btn-primary">Logout</a>
    </div>
</header>
<div class="container">
    <h2>Class Schedule Management</h2>
    <form id="scheduleForm" action="manage_schedule.php" method="post">
        <div class="form-group">
            <label for="batch">Batch:</label>
            <select id="batch" name="batch_id" class="form-control" required>
                <?php while ($batch = $batches_result->fetch_assoc()) { ?>
                    <option value="<?php echo $batch['id']; ?>"><?php echo $batch['batch_name']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="class_name">Class Name:</label>
            <input type="text" id="class_name" name="class_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
    <div id="calendar"></div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">
<script src="../schedule.js"></script>
</body>
</html>

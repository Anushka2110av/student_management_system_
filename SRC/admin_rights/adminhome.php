<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:../log_main/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../style_css_main/admin_style/admin.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <a href="">Admin Dashboard</a>
        <div class="logout">
            <a href="../log_main/logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
           
            <li><a href="admin_schedule.php">Class Schedule</a></li>
            
            <li><a href="create_batch.php">Create Batch</a></li>
            <li><a href="view_batches.php">View Batches</a></li>
            
            <li><a href="mark_attendance.php">Mark Attendance</a></li>
            
            <!-- <li><a href="generate_report.php">Generate Attendance Report</a></li> -->
            
            <!-- <li><a href="add_faculty.php">Add Faculty</a></li>
            <li><a href="view_faculty.php">View Faculty</a></li> -->
            
            <li><a href="add_course.php">Add Courses</a></li>
            <li><a href="view_courses.php">View Courses</a></li>
        </ul>
    </aside>

    <div class="content">
        <h2>Manage your Admin panel from here</h2>
        <div class="image-container">
            <img class="asbg" src="asbg.png" alt="Image">
        </div>
    </div>
</body>
</html>

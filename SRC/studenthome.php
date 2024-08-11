<?php
/**
 * This script serves as the homepage for students after they log in.
 * It displays a welcome message and provides links to various student-related pages.
 */

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

require_once('login_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="student.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <header class="header">
        <a href="">Student Dashboard</a>
        <div class="logout">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li><a href="view_batches.php">Your Batches</a></li>
            <li><a href="view_classes.php">View Classes</a></li>
            <li><a href="view_attendance.php">View Attendance</a></li>
            <!-- <li><a href="view_faculty.php">View Your Faculty</a></li> -->
            <li><a href="view_courses.php">View Your Courses</a></li>
        </ul>
    </aside>

    <div class="content">
        <h2>Manage your Student panel from here</h2>
        <div class="image-container">
            <img class="asbg" src="asbg.png" alt="Image">
        </div>
    </div>
</body>
</html>
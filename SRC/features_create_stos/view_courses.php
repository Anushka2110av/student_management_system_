<?php
/**
 * This script displays the list of courses.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * The script retrieves and displays the list of courses from the database.
 */
session_start();

if (!isset($_SESSION['username'])) {
    header("location:../log_main/login.php");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'studentmanagement');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM courses");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Courses</title>
    <link rel="stylesheet" href="../student_style/view_courses.css">
</head>
<body>
    <header class="header">
        <a href="studenthome.php">Home</a>
        <a class="logout" href="../log_main/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>Course List</h1>
        <table>
            <tr>
                <th>Course Name</th>
                <th>Description</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>

<?php
/**
 * This script displays the attendance records for students.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * The script retrieves and displays the attendance records from the database.
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

$classes = $conn->query("SELECT * FROM classes");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];
    $result = $conn->query("SELECT s.student_name, a.status FROM attendance a JOIN students s ON a.student_id = s.id WHERE a.class_id = '$class_id' AND a.date = '$date'");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="../admin_style/view_attendance.css"> 
</head>
<body>
    <header class="header">
        <a href="adminhome.php">Home</a>
        <a class="logout" href="../log_mian/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>View Attendance</h1>
        <form method="POST">
            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id" required>
                <?php while ($class = $classes->fetch_assoc()): ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
            <br>
            <button type="submit">View</button>
        </form>
        <?php if (isset($result)): ?>
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>

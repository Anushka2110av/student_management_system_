<?php
/**
 * This script generates attendance reports for a selected class.
 * It starts by checking if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database and fetches all classes.
 * When the form is submitted via POST request, it retrieves the selected class ID from the form data.
 * It then queries the database to fetch attendance records for the selected class, joining with the students table to get student names.
 * The results are ordered by the date of attendance.
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
    $result = $conn->query("SELECT s.student_name, a.date, a.status FROM attendance a JOIN students s ON a.student_id = s.id WHERE a.class_id = '$class_id' ORDER BY a.date");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Attendance Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <a href="adminhome.php">Home</a>
        <a class="logout" href="../log_main/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>Generate Attendance Report</h1>
        <form method="POST">
            <label for="class_id">Class:</label>
            <select name="class_id" id="class_id" required>
                <?php while ($class = $classes->fetch_assoc()): ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <button type="submit">Generate</button>
        </form>
        <?php if (isset($result)): ?>
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['student_name']; ?></td>
                        <td><?php echo $row['date']; ?></td>
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

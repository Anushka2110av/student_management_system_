<?php
/**
 * This script handles the marking of attendance for students in a specific class.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database and retrieves the list of students and classes.
 * When the form is submitted via POST request, it retrieves the class ID, date, and attendance status for each student from the form data.
 * It then inserts the attendance records into the database.
 * Finally, it displays a success message indicating that the attendance has been marked successfully.
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

$students = $conn->query("SELECT * FROM students");
$classes = $conn->query("SELECT * FROM classes");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_id = $_POST['class_id'];
    $date = $_POST['date'];

    foreach ($_POST['attendance'] as $student_id => $status) {
        $conn->query("INSERT INTO attendance (class_id, student_id, date, status) VALUES ('$class_id', '$student_id', '$date', '$status')");
    }

    echo "Attendance marked successfully!";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="mark_attendance.css">
</head>
<body>
    <header class="header">
        <a href="adminhome.php">Home</a>
        <a class="logout" href="../log_main/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>Mark Attendance</h1>
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
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Present</th>
                    <th>Absent</th>
                </tr>
                <?php while ($student = $students->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $student['student_name']; ?></td>
                        <td><input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Present" required></td>
                        <td><input type="radio" name="attendance[<?php echo $student['id']; ?>]" value="Absent" required></td>
                    </tr>
                <?php endwhile; ?>
            </table>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>

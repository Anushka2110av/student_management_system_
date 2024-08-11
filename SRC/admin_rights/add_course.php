<?php
/**
 * This script handles the addition of new courses by the admin.
 * It starts by checking if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * When the form is submitted via POST request, it retrieves the course name and description from the form data.
 * It prepares an SQL statement to insert the new course into the database and executes it.
 * If the insertion is successful, it displays a success message; otherwise, it displays an error message.
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO courses (course_name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $course_name, $description);

    if ($stmt->execute()) {
        echo "New course added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style_css_main/add_course.css">
</head>
<body>
<header class="header">
    <a href="adminhome.php">Home</a>
    <a class="logout" href="../log_main/logout.php">Logout</a>
</header>
<div class="content">
    <h1>Add New Course</h1>
    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>
    <form action="add_course.php" method="post">
        <div class="form-group">
            <label for="course_name">Course Name:</label>
            <input type="text" id="course_name" name="course_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        <input type="submit" value="Add Course" class="btn btn-primary">
    </form>
</div>
</body>
</html>

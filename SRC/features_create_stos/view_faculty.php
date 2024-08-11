<?php
/**
 * This script displays the list of faculty members.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * The script retrieves and displays the list of faculty members from the database.
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

$result = $conn->query("SELECT * FROM faculty");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Faculty</title>
    <link rel="stylesheet" href="../student_style/view_faculty.css">
</head>
<body>
    <header class="header">
        <a href="studenthome.php">Home</a>
        <a class="logout" href="../log_main/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>Faculty List</h1>
        <div class="faculty-list">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="faculty-item">
                    <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Faculty Image">
                    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>

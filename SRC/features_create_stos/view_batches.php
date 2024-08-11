<?php
/**
 * This script displays the list of batches.
 * It starts by verifying if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * The script retrieves and displays the list of batches from the database.
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

$result = $conn->query("SELECT * FROM batches");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Batches</title>
    <link rel="stylesheet" type="text/css" href="../admin_style/view_batches.css">
</head>
<body>

    
    <header class="header">
        <a href="SRC/admin_rights/adminhome.php">Admin Dashboard</a>
        <div class="logout">
            <a href="../log_main/logout.php" class="btn btn-primary">Logout</a>
        </div>
    </header>

   

    <div class="content">
        <h2>View Batches</h2>
        <table border="1">
            <tr>
                <th>Batch Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Capacity</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['batch_name']; ?></td>
                <td><?php echo $row['start_date']; ?></td>
                <td><?php echo $row['end_date']; ?></td>
                <td><?php echo $row['capacity']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>

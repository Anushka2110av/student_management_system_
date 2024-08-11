<?php
/**
 * This script handles the addition of new faculty members by the admin.
 * It starts by checking if the user is logged in; if not, it redirects to the login page.
 * It then establishes a connection to the database.
 * When the form is submitted via POST request, it retrieves the faculty name and description from the form data.
 * It also handles the file upload process for the faculty image, including validation to ensure the uploaded file is an actual image.
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
    $faculty_name = $_POST['faculty_name'];
    $description = $_POST['description'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) { // 500 KB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $conn->prepare("INSERT INTO faculty (faculty_name, image, description) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $faculty_name, $target_file, $description);

            if ($stmt->execute()) {
                echo "New faculty member added successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
    <link rel="stylesheet" href="../style_css_main/add_faculty.css">
</head>
<body>
    <header class="header">
        <a href="adminhome.php">Home</a>
        <a class="logout" href="../log_main/logout.php">Logout</a>
    </header>
    <div class="content">
        <h1>Add New Faculty</h1>
        <form action="add_faculty.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="faculty_name">Faculty Name:</label>
                <input type="text" id="faculty_name" name="faculty_name" class="form-control" required><br><br>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" class="form-control" required><br><br>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea><br><br>
            </div>
            <input type="submit" value="Add Faculty" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

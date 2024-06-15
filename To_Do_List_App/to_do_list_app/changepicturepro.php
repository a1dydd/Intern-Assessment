<?php
// Include database connection
include_once 'dbconnection.php';

// Start session to get the current username
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['picture']) && $_FILES['picture']['error'] == UPLOAD_ERR_OK) {
    $upload_dir = 'image/'; // Directory to upload the file
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif']; // Allowed file types
    $max_file_size = 5 * 1024 * 1024; // Max file size in bytes (5MB)

    // Validate file type
    $file_type = mime_content_type($_FILES['picture']['tmp_name']);
    if (!in_array($file_type, $allowed_types)) {
        echo '<script>alert("Invalid file type. Please upload an image file (jpg, png, gif).");</script>';
        echo '<script>window.location.href="changepicture.php";</script>';
        exit;
    }

    // Validate file size
    if ($_FILES['picture']['size'] > $max_file_size) {
        echo '<script>alert("File size exceeds the limit. Please upload a file smaller than 5MB.");</script>';
        echo '<script>window.location.href="changepicture.php";</script>';
        exit;
    }

    // Create a unique file name
    $file_name = basename($_FILES['picture']['name']);
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid('user_', true) . '.' . $file_ext;
    $target_file = $upload_dir . $new_file_name;

    // Move the uploaded file to the server
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
        // Update the database with the new file name
        $sql = "UPDATE `user` SET `picture`='$new_file_name' WHERE `username`='$username'";
        $result = mysqli_query($dbc, $sql);

        if ($result) {
            mysqli_commit($dbc);
            echo '<script>alert("Profile picture updated successfully.");</script>';
            echo '<script>window.location.href="editprofile.php";</script>';
        } else {
            mysqli_rollback($dbc);
            echo '<script>alert("Failed to update profile picture. Please try again.");</script>';
            echo '<script>window.location.href="changepicture.php";</script>';
        }
    } else {
        echo '<script>alert("Failed to upload the file. Please try again.");</script>';
        echo '<script>window.location.href="changepicture.php";</script>';
    }
} else {
    echo '<script>alert("No file uploaded or upload error occurred.");</script>';
    echo '<script>window.location.href="changepicture.php";</script>';
}
?>

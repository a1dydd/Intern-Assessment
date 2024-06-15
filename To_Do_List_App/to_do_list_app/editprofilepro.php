<?php
include_once 'dbconnection.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$currentUsername = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = trim(mysqli_real_escape_string($dbc, $_POST['username']));

    // Check if the new username is different from the current one
    if ($newUsername !== $currentUsername) {
        // Check if the new username already exists
        $checkSql = "SELECT username FROM user WHERE username = '$newUsername'";
        $checkResult = mysqli_query($dbc, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            echo '<script>alert("Username already taken. Please choose a different username.");</script>';
            echo '<script>window.location.assign("editprofile.php");</script>';
        } else {
            // Update the username in the database
            $updateSql = "UPDATE user SET username = '$newUsername' WHERE username = '$currentUsername'";
            $updateResult = mysqli_query($dbc, $updateSql);

            if ($updateResult) {
                // Update session with new username
                $_SESSION['username'] = $newUsername;

                echo '<script>alert("Username successfully updated.");</script>';
                echo '<script>window.location.assign("editprofile.php");</script>';
            } else {
                echo '<script>alert("Failed to update username: ' . mysqli_error($dbc) . '");</script>';
                echo '<script>window.location.assign("editprofile.php");</script>';
            }
        }
    } else {
        // No changes were made
        echo '<script>alert("No changes made to the username.");</script>';
        echo '<script>window.location.assign("editprofile.php");</script>';
    }
} else {
    echo '<script>alert("Invalid request.");</script>';
    echo '<script>window.location.assign("editprofile.php");</script>';
}
?>

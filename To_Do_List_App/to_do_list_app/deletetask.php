<?php
session_start();
include 'dbconnection.php'; // Ensure you have a proper database connection file

if (isset($_GET['taskid'])) {
    $taskid = $_GET['taskid'];

    // Delete task from the database
    $sql = "DELETE FROM todo WHERE taskid='$taskid' AND username='{$_SESSION['username']}'";
    if (mysqli_query($dbc, $sql)) {
        echo "Task deleted successfully.";
    } else {
        echo "Error deleting task: " . mysqli_error($dbc);
    }

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>

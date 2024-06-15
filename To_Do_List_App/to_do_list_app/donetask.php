<?php
session_start();
include 'dbconnection.php'; // Ensure you have a proper database connection file

if (isset($_GET['taskid'])) {
    $taskid = $_GET['taskid'];

    // Update task status to 'DONE'
    $sql = "UPDATE todo SET status='DONE' WHERE taskid='$taskid' AND username='{$_SESSION['username']}'";
    if (mysqli_query($dbc, $sql)) {
        echo "Task status updated to DONE successfully.";
    } else {
        echo "Error updating task: " . mysqli_error($dbc);
    }

    // Redirect back to the main page
    header("Location: index.php");
    exit();
}
?>

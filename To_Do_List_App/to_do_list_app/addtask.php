<?php
// addtask.php

session_start();
// Include database connection file
include_once 'dbconnection.php';

$username = $_SESSION['username'];
$task = $_POST['task'];
$category = $_POST['category'];


// Insert into todo table
$sql = "INSERT INTO todo (username, category, task, status) VALUES ('$username', '$category', '$task', 'PENDING')";
$result = mysqli_query($dbc, $sql);

if ($result) {
    echo "<script>window.location.assign('index.php');</script>";
} else {
    echo "<script>window.location.assign('index.php');</script>";
}

?>
<?php
// indexpro.php
include_once 'dbconnection.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

// Retrieve user data including the picture
$sql = "SELECT * FROM `user` WHERE `username`='$username'";
$result = mysqli_query($dbc, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $fetch_user = mysqli_fetch_assoc($result);
    $picture = $fetch_user['picture'];
} else {
    // Handle case where user not found or query fails
    // Redirect to login or show an error message
    header('Location: login.php');
    exit;
}

// Auto logout with a timer (10 minutes)
if (isset($_SESSION['timeout'])) {
    $timeout = $_SESSION['timeout'];
    if ($timeout + 600 < time()) {
        session_destroy();
        header('Location: login.php');
        exit;
    }
} else {
    $_SESSION['timeout'] = time();
}
?>

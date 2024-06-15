<?php
// resetpasswordpro.php

session_start();
include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $currentpassword = $_POST["currentpassword"];
  $newpassword = $_POST["newpassword"];
  $username = $_SESSION["username"];

  $sql = "SELECT password FROM user WHERE username = '$username'";
  $result = mysqli_query($dbc, $sql);
  $row = mysqli_fetch_assoc($result);
  $stored_password = $row["password"];

  if ($currentpassword == $stored_password) {
    if ($newpassword == $currentpassword) {
      echo '<script>alert("New password cannot be the same as the current password.");</script>';
      echo '<script>window.location.assign("resetpassword.php");</script>';
    } else {
      $sql = "UPDATE user SET password = '$newpassword' WHERE username = '$username'";
      $result = mysqli_query($dbc, $sql);
      if ($result) {
        echo '<script>alert("Password updated, Please Relog");</script>';
        echo '<script>window.location.assign("logout.php");</script>';
            
      } else {
        echo '<script>alert("Error updating password!");</script>';
        echo '<script>window.location.assign("resetpassword.php");</script>';
    }
    }
  } else {
    echo '<script>alert("Current password is incorrect.");</script>';
    echo '<script>window.location.assign("resetpassword.php");</script>';
}
}

mysqli_close($dbc);
?>
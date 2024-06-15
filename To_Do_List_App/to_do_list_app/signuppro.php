<?php

$username=$_POST['username'];
$password=$_POST['password'];

include_once 'dbconnection.php';

$sql_check = "SELECT * FROM `user` WHERE `username` = '$username'";
$result_check = mysqli_query($dbc, $sql_check);

if (mysqli_num_rows($result_check) > 0) 
{
    print '<script>alert("Account Already Exists");</script>';
    print '<script>window.location.assign("signup.php");</script>';
} 
else 
{
    
    $sql="insert into `user`(`username`,`password`) values ('$username','$password')";
    $results= mysqli_query($dbc,$sql);
    if ($results) 
    {
        mysqli_commit($dbc);
        print '<script>alert("Your Are All Set, Login Now");</script>';
        print '<script>window.location.assign("login.php");</script>';
    } 
    else 
    {
        mysqli_rollback($dbc);
        print '<script>alert("Please Try Again");</script>';
        print '<script>window.location.assign("signup.php");</script>';
    }
}

?>
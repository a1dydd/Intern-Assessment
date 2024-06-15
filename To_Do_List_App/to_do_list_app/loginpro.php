<?php
  session_start(); 
  $username=$_POST['username'];
  $password=$_POST['password'];

  include "dbconnection.php";

  $sql="SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password';";
  $chksql=mysqli_query($dbc,$sql);
  $getrec=mysqli_num_rows($chksql);
  
  if ($getrec>0)
  { 
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    print '<script>window.location.assign("index.php");</script>';
  }
  else
  {
  	print '<script>alert("Please Try Again");</script>';
    print '<script>window.location.assign("login.php");</script>';
  }
?>
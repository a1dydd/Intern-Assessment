<html>
<title>Edit Profile</title>
    <link rel="stylesheet" href="css/editprofile.css">
    <body>
        <?php
            include_once 'dbconnection.php';
            
            session_start();
            
            if (!isset($_SESSION['username'])) {
                header('Location: login.php');
                exit;
            }
            
            $username = $_SESSION['username'];
            
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = mysqli_query($dbc,$sql);
            
            if (false === $result)
            {
            echo mysql_error();
            }
            $row = mysqli_fetch_assoc($result)
        ?>
      <div class="editform">
        <h2>Edit Profile</h2>
        <form action="editprofilepro.php?username=<?php echo $username;?>" method="post">
          <div class="editbox"> 
            <label for="">Username</label>
            <input type="text" name="username" value='<?=$row['username'];?>' required>
          </div>
          <button class="savebtn" type="submit">Save</button>
        </form>
        <div class="change">
            <a href="changepicture.php"><button class="changebtn">Change Picture</button></a>
        </div>
        <div class="reset">
            <a href="resetpassword.php"><button class="resetbtn">Reset Password</button></a>
        </div>
        <div class="back">
            <a href="index.php"><button class="backbtn">Back</button></a>
        </div>
      </div>
    </body>
</html>
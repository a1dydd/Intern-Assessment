<html>
<title>Change Picture</title>
<link rel="stylesheet" href="css/changepicture.css">
<body>
    <?php
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
            header('Location: login.php');
            exit;
        }
    ?>
    <div class="editform">
        <h2>Change Picture</h2>
        <div class="image-container">
            <img src="image/<?php echo $fetch_user['picture']; ?>" alt="Profile Picture" class="profile-picture"> 
        </div>
        <form action="changepicturepro.php?username=<?php echo $username;?>" method="post" enctype="multipart/form-data">
            <div class="editbox">
                <label for="picture">Picture</label>
                <input type="file" name="picture" id="picture">
            </div>
            <button class="savebtn" type="submit">Save</button>
        </form>
        <div class="back">
            <a href="editprofile.php"><button class="backbtn">Back</button></a>
        </div>
    </div>
</body>
</html>

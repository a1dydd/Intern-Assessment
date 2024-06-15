<html>
<title>Edit Profile</title>
    <link rel="stylesheet" href="css/resetpassword.css">
    <body>
      <div class="editform">
        <h2>Edit Profile</h2>
        <form action="resetpasswordpro.php" method="post">
        <div class="editbox"> 
            <label for="">Current Password</label>
            <input type="password" name="currentpassword" required>
          </div>
          <div class="editbox"> 
            <label for="">New Password</label>
            <input type="password" name="newpassword" required>
          </div>
          <button class="resetbtn" type="submit">Reset</button>
        </form>
        <div class="back">
            <a href="index.php"><button class="backbtn">Back</button></a>
        </div>
      </div>
    </body>
</html>
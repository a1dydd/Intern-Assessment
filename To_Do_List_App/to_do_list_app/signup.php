<html>
<title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css">
    <body>
      <div class="signupform">
        <h2>Sign Up</h2>
        <form action="signuppro.php" method="post">
          <div class="signupbox"> 
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="signupbox">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <button class="signupbtn" type="submit">Sign Up</button>
        </form>
        <div class="login">
            <a href="login.php"><button class="loginbtn">Login</button></a>
        </div>
      </div>
    </body>
</html>
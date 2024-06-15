<html>
<title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <body>
      <div class="loginform">
        <h2>Login</h2>
        <form action="loginpro.php" method="post">
          <div class="loginbox"> 
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="loginbox">
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <button class="loginbtn" type="submit">Login</button>
        </form>
        <div class="signup">
            <a href="signup.php"><button class="signupbtn">Sign Up</button></a>
        </div>
      </div>
    </body>
</html>
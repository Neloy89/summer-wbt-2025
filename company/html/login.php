
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
  </head>
  <body>
    <?php
    
    $usernameErr = $passwordErr = "";
    $username = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["username"])) {
        $usernameErr = "User Name is required";
      } else {
        $username = test_input($_POST["username"]);
      }

      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      } else {
        $password = test_input($_POST["password"]);
      }

      //login condition
      if (empty($usernameErr) && empty($passwordErr)) {
        if ($username === "Bob" && $password === "Sorry") {
          header("Location: dashboard.html");
          exit();
        }
      }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>

    <div class="container">
      <div class="header">
        <img src="../picture/x-company-logo.png" alt="xCompany Logo" class="logo" />
        <div class="nav">
          <a href="home.html">Home</a> | <a href="login.php">Login</a> |
          <a href="registration.html">Registration</a>
        </div>
      </div>
      <hr />
      <div class="login-form-container">
        <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="login-title"><b>LOGIN</b></div>
          <div class="login-group">
            <label>
              <span class="label-text">User Name</span>
              <span class="colon">:</span>
              <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" />
              <span class="error" style="color:red;">* <?php echo $usernameErr;?></span>
            </label>
          </div>
          <div class="login-group">
            <label>
              <span class="label-text">Password</span>
              <span class="colon">:</span>
              <input type="password" name="password" />
              <span class="error" style="color:red;">* <?php echo $passwordErr;?></span>
            </label>
          </div>
          <hr class="login-divider" />
          <div class="login-group remember-group">
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember" class="remember-label">Remember Me</label>
          </div>
          <div class="login-group buttons">
            <input type="submit" value="Submit" />
            <a href="forgotpassword.html" class="forgot-link">Forgot Password?</a>
          </div>
        </form>
      </div>
      <hr />
      <div class="footer">Copyright &copy; 2017</div>
    </div>
  </body>
</html>

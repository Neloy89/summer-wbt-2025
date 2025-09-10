
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="../css/forgotpassword.css" />
  </head>
  <body>
    <?php
    $emailErr = "";
    $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
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
          <a href="home.html">Home</a> | <a href="login.html">Login</a> |
          <a href="registration.html">Registration</a>
        </div>
      </div>
      <hr />
      <div class="forgot-form-container">
        <form class="forgot-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="forgot-title"><b>FORGOT PASSWORD</b></div>
          <div class="forgot-group">
            <label>
              <span class="label-text">Enter Email</span>
              <span class="colon">:</span>
              <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" />
              <span class="error" style="color:red;">* <?php echo $emailErr;?></span>
            </label>
          </div>
          <hr class="forgot-divider" />
          <div class="forgot-group buttons">
            <input type="submit" value="Submit" />
          </div>
        </form>
      </div>
      <hr />
      <div class="footer">Copyright &copy; 2017</div>
    </div>
  </body>
</html>

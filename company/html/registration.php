<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../css/registration.css" />
  </head>
  <body>

  <?php
  // Define variables and set to empty values
  $nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = "";
  $name = $email = $username = $password = $confirmpassword = $gender = $dd = $mm = $yyyy = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    } else {
      $email = test_input($_POST["email"]);
    }

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

    if (empty($_POST["confirmpassword"])) {
      $confirmpasswordErr = "Confirm Password is required";
    } else if ($_POST["confirmpassword"] !== $_POST["password"]) {
      $confirmpasswordErr = "Passwords do not match";
    } else {
      $confirmpassword = test_input($_POST["confirmpassword"]);
    }

    if (empty($_POST["gender"])) {
      $genderErr = "Gender is required";
    } else {
      $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["dd"]) || empty($_POST["mm"]) || empty($_POST["yyyy"])) {
      $dobErr = "Date of Birth is required";
    } else if (!is_numeric($_POST["dd"]) || !is_numeric($_POST["mm"]) || !is_numeric($_POST["yyyy"])) {
      $dobErr = "Invalid date format";
    } else {
      $dd = test_input($_POST["dd"]);
      $mm = test_input($_POST["mm"]);
      $yyyy = test_input($_POST["yyyy"]);
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
        <img
          src="../picture/x-company-logo.png"
          alt="xCompany Logo"
          class="logo"
        />
        <div class="nav">
          <a href="home.html">Home</a> | <a href="login.html">Login</a> |
          <a href="registration.html">Registration</a>
        </div>
      </div>
      <hr />
      <div class="form-container">
        <form
          method="post"
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
        >
          <div class="form-title"><b>REGISTRATION</b></div>
          <div class="form-group">
            <label>
              <span class="label-text">Name</span>
              <span class="colon">:</span>
              <input type="text" name="name" value="<?php echo $name; ?>" />
              <span class="error" style="color: red"
                >*
                <?php echo $nameErr;?></span
              >
            </label>
          </div>
          <div class="form-group">
            <label>
              <span class="label-text">Email</span>
              <span class="colon">:</span>
              <input type="text" name="email" value="<?php echo $email; ?>" />
              <span class="error" style="color: red"
                >*
                <?php echo $emailErr;?></span
              >
            </label>
          </div>
          <div class="form-group">
            <label>
              <span class="label-text">User Name</span>
              <span class="colon">:</span>
              <input
                type="text"
                name="username"
                value="<?php echo $username; ?>"
              />
              <span class="error" style="color: red"
                >*
                <?php echo $usernameErr;?></span
              >
            </label>
          </div>
          <div class="form-group">
            <label>
              <span class="label-text">Password</span>
              <span class="colon">:</span>
              <input
                type="password"
                name="password"
                value="<?php echo $password; ?>"
              />
              <span class="error" style="color: red"
                >*
                <?php echo $passwordErr;?></span
              >
            </label>
          </div>
          <div class="form-group">
            <label>
              <span class="label-text">Confirm Password</span>
              <span class="colon">:</span>
              <input
                type="password"
                name="confirmpassword"
                value="<?php echo $confirmpassword; ?>"
              />
              <span class="error" style="color: red"
                >*
                <?php echo $confirmpasswordErr;?></span
              >
            </label>
          </div>
          <div class="form-group box-group">
            <div class="box-label">Gender</div>
            <div class="box-content gender-box">
              <label
                ><input type="radio" name="gender" value="male"
                <?php if($gender=="male") echo "checked"; ?>
                /> Male</label
              >
              <label
                ><input type="radio" name="gender" value="female"
                <?php if($gender=="female") echo "checked"; ?>
                /> Female</label
              >
              <label
                ><input type="radio" name="gender" value="other"
                <?php if($gender=="other") echo "checked"; ?>
                /> Other</label
              >
              <span class="error" style="color: red"
                >*
                <?php echo $genderErr;?></span
              >
            </div>
          </div>
          <div class="form-group box-group">
            <div class="box-label">Date of Birth</div>
            <div class="box-content dob-box">
              <input
                type="text"
                name="dd"
                size="2"
                maxlength="2"
                value="<?php echo $dd; ?>"
              />
              /
              <input
                type="text"
                name="mm"
                size="2"
                maxlength="2"
                value="<?php echo $mm; ?>"
              />
              /
              <input
                type="text"
                name="yyyy"
                size="4"
                maxlength="4"
                value="<?php echo $yyyy; ?>"
              />
              <span class="dob-format">(dd/mm/yyyy)</span>
              <span class="error" style="color: red"
                >*
                <?php echo $dobErr;?></span
              >
            </div>
          </div>
          <div class="form-group buttons">
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
          </div>
        </form>
      </div>
      <hr />
      <div class="footer">Copyright &copy; 2017</div>
    </div>
  </body>
</html>

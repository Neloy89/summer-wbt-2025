<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact</title>
    <style>
    body {
      background-image: url(/wbt/image/image.png);
      background-size: cover;
      text-align: center;
      margin: 40px;
    }
    header {
      background-color: #ceeddf;
      height: 30px;
      padding: 10px;
      padding-top: 16px;
      text-align: center;
      border-radius: 10px;
      font-size: 1.5em;
    }
    header a {
      text-decoration: none;
      margin: 65px;
      color: #000000;
      font-weight: bold;
    }
    h1 {
      background-color: #7ee2dc;
      display: inline-block;
      padding: 10px 20px;
      border-radius: 10px;
    }
    div {
      padding-right: 1%;
      margin: 1%;
    }
    form {
      margin: 30px 70px;
    }
    .form-group {
      display: flex;
      align-content: center;
      margin: 10px;
    }
    .form-group label {
      flex-basis: 500px;
      text-align: right;
      margin-right: 10px;
      font-weight: bold;
    }
    .form-buttons {
      text-align: center;
      margin-top: 20px;
    }
    div {
      text-align: left;
    }
    img:hover {
      transform: scale(1.2);
      transition: all 1s;
    }
    footer {
      text-align: center;
      margin-top: 40px;
    }
    footer img {
      height: 30px;
      width: 30px;
      box-shadow: 0 4px 12px #ceeddf;
    }
    footer a {
      display: inline-block;
      width: 30px;
      height: 30px;
      margin: 0px;
    }
    footer p {
      margin: 0px;
    }
    .error { color: red; }
    </style>
</head>
<body>
    <header>
      <a href="/wbt/index.html">Home</a>
      <a href="/wbt/html/education.html">Education</a>
      <a href="/wbt/html/project.html">Projects</a>
      <a href="/wbt/html/experience.html">Experience</a>
      <a href="/wbt/html/contact.html">Contact</a>
    </header>
    <br />

    <h1>Contuct for details</h1>

<?php
$firstname = $lastname = $email = $consulting = $project = "";
$category = [];
$firstnameErr = $lastnameErr = $emailErr = $consultingErr = $projectErr = $categoryErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = test_input($_POST["Firstname"]);
    $lastname = test_input($_POST["Lastname"]);
    $email = test_input($_POST["email"]);
    $consulting = test_input($_POST["consulting"]);
    $project = isset($_POST["project"]) ? $_POST["project"] : "";

    if (empty($_POST["category"])) {
        $categoryErr = "Select at least one category";
    } else {
        $category = $_POST["category"];
    }

    if (empty($firstname)) {
        $firstnameErr = "First Name is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
        $firstnameErr = "Only letters and white space allowed";
    }

    if (empty($lastname)) {
        $lastnameErr = "Last Name is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $lastname)) {
        $lastnameErr = "Only letters and white space allowed";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($project)) {
        $projectErr = "Project type is required";
    }

    if (empty($consulting)) {
        $consultingErr = "Consulting date is required";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

    <form method="post" class="contuct">
      <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="Firstname" value="<?php echo $firstname; ?>" />
        <span class="error"><?php echo $firstnameErr;?></span>
      </div>

      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="Lastname" value="<?php echo $lastname; ?>" />
        <span class="error"><?php echo $lastnameErr;?></span>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" />
        <span class="error"><?php echo $emailErr;?></span>
      </div>

      <div class="form-group">
        <label>Working Category:</label>
        <div class="form-options">
          <input type="checkbox" id="projects" name="category[]" value="Projects" <?php if(is_array($category) && in_array("Projects", $category)) echo "checked"; ?> />
          <label for="projects">Projects</label><br />

          <input type="checkbox" id="research" name="category[]" value="Research" <?php if(is_array($category) && in_array("Research", $category)) echo "checked"; ?> />
          <label for="research">Research</label><br />

          <input type="checkbox" id="webdev" name="category[]" value="Web Developing" <?php if(is_array($category) && in_array("Web Developing", $category)) echo "checked"; ?> />
          <label for="webdev">Web Developing</label>
        </div>
        <span class="error"><?php echo $categoryErr;?></span>
      </div>

      <div class="form-group">
        <label>Types of project:</label>
        <div class="form-options">
          <input type="radio" id="webProject" name="project" value="webProject" <?php if($project=="webProject") echo "checked"; ?> />
          <label for="webProject">Web Application</label><br />

          <input type="radio" id="desktopApp" name="project" value="desktopApp" <?php if($project=="desktopApp") echo "checked"; ?> />
          <label for="desktopApp">Desktop Application</label><br />

          <input type="radio" id="javaApp" name="project" value="javaApp" <?php if($project=="javaApp") echo "checked"; ?> />
          <label for="javaApp">Java Based Application</label>
        </div>
        <span class="error"><?php echo $projectErr;?></span>
      </div>

      <div class="form-group">
        <label for="consulting">Consulting Date:</label>
        <input type="date" id="consulting" name="consulting" value="<?php echo $consulting; ?>" />
        <span class="error"><?php echo $consultingErr;?></span>
      </div>

      <br /><br />

      <div class="form-buttons">
        <input type="submit" value="Register" />
        <input type="reset" value="Refresh" />
      </div>
    </form>
    <br />

    <footer>
      <a href="mailto:fardinneloy89@gmail.com" target="_main"
        ><img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaAuJC3T4we7EMGLKHmlqoN960tceVmxPlfg&s"
          alt="fardinneloy89@gmail.com"
          height="30"
      /></a>
      <a href="https://www.facebook.com/mdrobin.neloy" target="_main"
        ><img
          src="https://upload.wikimedia.org/wikipedia/commons/0/05/Facebook_Logo_%282019%29.png"
          alt="facebook"
          height="30"
      /></a>
      <a href="https://github.com/Neloy89"
        ><img
          src="https://cdn.pixabay.com/photo/2022/01/30/13/33/github-6980894_960_720.png"
          height="30"
      /></a>
      <br />

      <p>
        Copyright <time datetime="2025">2025</time> All rights reserved
        <strong>©</strong>
      </p>
    </footer>
    <script src
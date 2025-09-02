<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Student Registration Form</title>
    <style>
        body {
            background-color: #fdd9d5;
            font-family: Arial, sans-serif;
        }
        .containerBox {
            width: 900px;
            margin: 20px auto;
        }
        h1 {
            text-align: center;
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .formGroup {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }
        .formGroup label {
            flex-basis: 220px;
            font-size: 1.1em;
            font-weight: bold;
        }
        .formGroup input[type="text"],
        .formGroup input[type="email"],
        .formGroup input[type="password"],
        .formGroup input[type="file"],
        .formGroup select,
        .formGroup textarea {
            flex: 1;
            padding: 6px;
            font-size: 1em;
        }
        .formGroup input[type="radio"],
        .formGroup input[type="checkbox"] {
            margin-left: 10px;
        }
        .dobInputs input {
            width: 80px;
            margin-right: 8px;
        }
        .formButtons {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
// define variables and set to empty values
$rollno = $firstname = $lastname = $fathername = "";
$day = $month = $year = $mobile = $email = $password = "";
$gender = $course = $city = $address = "";
$department = [];

$rollnoErr = $firstnameErr = $lastnameErr = $fathernameErr = "";
$dobErr = $mobileErr = $emailErr = $passwordErr = $genderErr = "";
$departmentErr = $courseErr = $cityErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $rollno = test_input($_POST["rollno"]);
    $firstname = test_input($_POST["firstname"]);
    $lastname = test_input($_POST["lastname"]);
    $fathername = test_input($_POST["fathername"]);
    $day = test_input($_POST["day"]);
    $month = test_input($_POST["month"]);
    $year = test_input($_POST["year"]);
    $mobile = test_input($_POST["mobile"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $gender = test_input($_POST["gender"]);
    $course = test_input($_POST["course"]);
    $city = test_input($_POST["city"]);
    $address = test_input($_POST["address"]);

    
    if (isset($_POST["department"])) {
        $department = $_POST["department"];
    } else {
        $department = [];
    }

    
    if (empty($rollno)) {
        $rollnoErr = "Roll number is required";
    }

    if (empty($firstname)) {
        $firstnameErr = "First name is required";
    }

    if (empty($lastname)) {
        $lastnameErr = "Last name is required";
    }

    if (empty($fathername)) {
        $fathernameErr = "Father's name is required";
    }

    if (empty($day) || empty($month) || empty($year)) {
        $dobErr = "Date of birth is required";
    }

    if (empty($mobile)) {
        $mobileErr = "Mobile number is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($password)) {
        $passwordErr = "Password is required";
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    if (empty($department)) {
        $departmentErr = "At least one department is required";
    }

    if (empty($course)) {
        $courseErr = "Course is required";
    }

    if (empty($city)) {
        $cityErr = "City is required";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="containerBox">
    <h1>Student Registration Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="formGroup">
            <label for="rollno">Roll no. :</label>
            <input type="text" id="rollno" name="rollno" value="<?php echo $rollno; ?>">
            <span style="color:red">* <?php echo $rollnoErr;?></span>
        </div>
        <div class="formGroup">
            <label for="firstname">Student name :</label>
            <input type="text" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>">
            <span>-</span>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>">
            <span style="color:red">* <?php echo $firstnameErr . ' ' . $lastnameErr;?></span>
        </div>
        <div class="formGroup">
            <label for="fathername">Father's name :</label>
            <input type="text" id="fathername" name="fathername" value="<?php echo $fathername; ?>">
            <span style="color:red">* <?php echo $fathernameErr;?></span>
        </div>
        <div class="formGroup">
            <label>Date of birth :</label>
            <div class="dobInputs">
                <input type="number" name="day" placeholder="Day" value="<?php echo $day; ?>">
                <span>-</span>
                <input type="number" name="month" placeholder="Month" value="<?php echo $month; ?>">
                <span>-</span>
                <input type="number" name="year" placeholder="Year" value="<?php echo $year; ?>">
                <span style="margin-left: 10px">(DD-MM-YYYY)</span>
            </div>
            <span style="color:red">* <?php echo $dobErr;?></span>
        </div>
        <div class="formGroup">
            <label>Mobile no. :</label>
            <input type="text" value="+91" readonly style="width: 10px;">
            <input type="text" name="mobile" style="width: 200px" value="<?php echo $mobile; ?>">
            <span style="color:red">* <?php echo $mobileErr;?></span>
        </div>
        <div class="formGroup">
            <label for="email">Email id :</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <span style="color:red">* <?php echo $emailErr;?></span>
        </div>
        <div class="formGroup">
            <label for="password">Password :</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>">
            <span style="color:red">* <?php echo $passwordErr;?></span>
        </div>
        <div class="formGroup">
            <label>Gender :</label>
            <input type="radio" id="male" name="gender" value="Male" <?php if($gender=="Male") echo "checked"; ?>>
            <label for="male" style="font-weight: normal">Male</label>
            <input type="radio" id="female" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>>
            <label for="female" style="font-weight: normal">Female</label>
            <span style="color:red">* <?php echo $genderErr;?></span>
        </div>
        <div class="formGroup">
            <label>Department :</label>
            <input type="checkbox" id="cse" name="department[]" value="CSE" <?php if(in_array("CSE", $department)) echo "checked"; ?>>
            <label for="cse" style="font-weight: normal">CSE</label>
            <input type="checkbox" id="it" name="department[]" value="IT" <?php if(in_array("IT", $department)) echo "checked"; ?>>
            <label for="it" style="font-weight: normal">IT</label>
            <input type="checkbox" id="ece" name="department[]" value="ECE" <?php if(in_array("ECE", $department)) echo "checked"; ?>>
            <label for="ece" style="font-weight: normal">ECE</label>
            <input type="checkbox" id="civil" name="department[]" value="Civil" <?php if(in_array("Civil", $department)) echo "checked"; ?>>
            <label for="civil" style="font-weight: normal">Civil</label>
            <input type="checkbox" id="mech" name="department[]" value="Mech" <?php if(in_array("Mech", $department)) echo "checked"; ?>>
            <label for="mech" style="font-weight: normal">Mech</label>
            <span style="color:red">* <?php echo $departmentErr;?></span>
        </div>
        <div class="formGroup">
            <label for="course">Course :</label>
            <select id="course" name="course">
                <option value="BCA" <?php if($course=="BCA") echo "selected"; ?>>BCA</option>
                <option value="BSc" <?php if($course=="BSc") echo "selected"; ?>>BSc</option>
                <option value="MSc" <?php if($course=="MSc") echo "selected"; ?>>MSc</option>
            </select>
            <span style="color:red">* <?php echo $courseErr;?></span>
        </div>
        <div class="formGroup">
            <label for="photo">Student photo :</label>
            <input type="file" id="photo" name="photo">
        </div>
        <div class="formGroup">
            <label for="city">City :</label>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>">
            <span style="color:red">* <?php echo $cityErr;?></span>
        </div>
        <div class="formGroup">
            <label for="address">Address :</label>
            <textarea id="address" name="address"><?php echo $address; ?></textarea>
        </div>
        <div class="formButtons">
            <input type="submit" value="Register">
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !$rollnoErr && !$firstnameErr && !$lastnameErr && !$fathernameErr && !$dobErr && !$mobileErr && !$emailErr && !$passwordErr && !$genderErr && !$departmentErr && !$courseErr && !$cityErr) {
        echo "<h2>Your Input:</h2>";
        echo "Roll Number: " . $rollno . "<br>";
        echo "Student Name: " . $firstname . " " . $lastname . "<br>";
        echo "Father's Name: " . $fathername . "<br>";
        echo "Date of Birth: " . $day . "-" . $month . "-" . $year . "<br>";
        echo "Mobile: " . $mobile . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Password: " . $password . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Department: " . implode(", ", $department) . "<br>";
        echo "Course: " . $course . "<br>";
        echo "City: " . $city . "<br>";
        echo "Address: " . $address . "<br>";
    }
    ?>
</div>

</body>
</html>
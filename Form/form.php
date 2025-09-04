<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/Form/form.css" />
    <style>
        .error { color: red; }
        body{
            background-color: rgb(243, 237, 228);
        }
        form{
            margin-left: 20px;
        }
        .form-group{
            display: flex;
            align-content: center;
            margin: 10px;
        }

        .form-group label{
            flex-basis: 400px;
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }
        div{
            text-align: left;
        }

        .head a{
            text-decoration: none;
            color: black;
            margin: 10px;
        }

        #submit{
            text-align: center;
        }
        h2{
            color: red;
            margin-bottom:0px ;
        }
        h3{display: inline;
        color: red;}
        .smallbox{
            width: 60px;
        }
    </style>
</head>
<body>
<h3>*</h3>
Denotes Required Information

<div class="head">
    <a href="">> 1 Donation</a>
    <a href="">> 2 Confirmation</a>
    <a href="">> Thank You!</a>
</div>

<?php
// Initialize variables
$firstname = $lastname = $company = $address1 = $address2 = $city = $state = $zip = $country = $fax = $email = $amount = $other_amount = "";
$recurring = $monthly_credit_card = $monthly_months = "";
$donation_type = $honor_name = $acknowledge = $honor_address = $honor_city = $honor_state = $honor_zip = "";
$additional_name = $anonymous_gift = $matching_gift = $no_thank_you = $comments = "";
$contact = $newsletter = $anonymous_gift_2 = "";

$firstnameErr = $lastnameErr = $address1Err = $cityErr = $stateErr = $zipErr = $countryErr = $emailErr = $amountErr = "";
$other_amountErr = $monthly_credit_cardErr = $monthly_monthsErr = $donation_typeErr = $honor_nameErr = $acknowledgeErr = $honor_addressErr = $honor_cityErr = $honor_stateErr = $honor_zipErr = $additional_nameErr = $commentsErr = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Donor Information
    $firstname = test_input($_POST["firstname"] ?? "");
    $lastname = test_input($_POST["lastname"] ?? "");
    $company = test_input($_POST["company"] ?? "");
    $address1 = test_input($_POST["address1"] ?? "");
    $address2 = test_input($_POST["address2"] ?? "");
    $city = test_input($_POST["city"] ?? "");
    $state = test_input($_POST["state"] ?? "");
    $zip = test_input($_POST["zip"] ?? "");
    $country = test_input($_POST["country"] ?? "");
    $fax = test_input($_POST["fax"] ?? "");
    $email = test_input($_POST["email"] ?? "");
    $amount = $_POST["amount"] ?? "";
    $other_amount = test_input($_POST["other_amount"] ?? "");
    $recurring = isset($_POST["recurring"]) ? "yes" : "";
    $monthly_credit_card = test_input($_POST["monthly_credit_card"] ?? "");
    $monthly_months = test_input($_POST["monthly_months"] ?? "");

    // Honorarium and Memorial Donation Information
    $donation_type = $_POST["donation_type"] ?? "";
    $honor_name = test_input($_POST["honor_name"] ?? "");
    $acknowledge = test_input($_POST["acknowledge"] ?? "");
    $honor_address = test_input($_POST["honor_address"] ?? "");
    $honor_city = test_input($_POST["honor_city"] ?? "");
    $honor_state = test_input($_POST["honor_state"] ?? "");
    $honor_zip = test_input($_POST["honor_zip"] ?? "");

    // Additional Information
    $additional_name = test_input($_POST["additional_name"] ?? "");
    $anonymous_gift = isset($_POST["anonymous_gift"]) ? "yes" : "";
    $matching_gift = isset($_POST["matching_gift"]) ? "yes" : "";
    $no_thank_you = isset($_POST["no_thank_you"]) ? "yes" : "";
    $comments = test_input($_POST["comments"] ?? "");
    $contact = $_POST["contact"] ?? [];
    $newsletter = $_POST["newsletter"] ?? [];
    $anonymous_gift_2 = isset($_POST["anonymous_gift_2"]) ? "yes" : "";

    // Validation
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

    if (empty($address1)) {
        $address1Err = "Address 1 is required";
    }

    if (empty($city)) {
        $cityErr = "City is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $city)) {
        $cityErr = "Only letters and white space allowed";
    }

    if (empty($state)) {
        $stateErr = "State is required";
    }

    if (empty($zip)) {
        $zipErr = "Zipcode is required";
    } elseif (!preg_match("/^[0-9]{4,10}$/", $zip)) {
        $zipErr = "Zipcode must be 4-10 digits";
    }

    if (empty($country)) {
        $countryErr = "Country is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($amount)) {
        $amountErr = "Donation Amount is required";
    }

    // Other Amount validation
    if ($amount === "Other") {
        if (empty($other_amount)) {
            $other_amountErr = "Other Amount is required";
        } elseif (!preg_match("/^[0-9]+$/", $other_amount)) {
            $other_amountErr = "Other Amount must be a number";
        }
    }

    // Monthly Credit Card validation
    if (!empty($monthly_credit_card) && !preg_match("/^[0-9]+$/", $monthly_credit_card)) {
        $monthly_credit_cardErr = "Monthly Credit Card must be a number";
    }

    // Monthly Months validation
    if (!empty($monthly_months) && (!preg_match("/^[0-9]+$/", $monthly_months) || $monthly_months < 1)) {
        $monthly_monthsErr = "Months must be a positive number";
    }

    if (!empty($donation_type) && !in_array($donation_type, ["honor", "memory"])) {
        $donation_typeErr = "Invalid donation type";
    }

    if (!empty($honor_name) && !preg_match("/^[a-zA-Z-' ]*$/", $honor_name)) {
        $honor_nameErr = "Only letters and white space allowed";
    }

    if (!empty($acknowledge) && strlen($acknowledge) < 3) {
        $acknowledgeErr = "Acknowledge must be at least 3 characters";
    }

    if (!empty($honor_address) && strlen($honor_address) < 3) {
        $honor_addressErr = "Honor Address must be at least 3 characters";
    }

    if (!empty($honor_city) && !preg_match("/^[a-zA-Z-' ]*$/", $honor_city)) {
        $honor_cityErr = "Only letters and white space allowed";
    }

    if (!empty($honor_state) && !in_array($honor_state, ["dhaka", "rajshahi", "khulna", "chittagong"])) {
        $honor_stateErr = "Invalid honor state";
    }

    if (!empty($honor_zip) && !preg_match("/^[0-9]{4,10}$/", $honor_zip)) {
        $honor_zipErr = "Honor Zip must be 4-10 digits";
    }

    if (!empty($additional_name) && strlen($additional_name) < 3) {
        $additional_nameErr = "Additional Name must be at least 3 characters";
    } elseif (!empty($additional_name) && !preg_match("/^[a-zA-Z-' ]*$/", $additional_name)) {
        $additional_nameErr = "Only letters and white space allowed";
    }

    if (!empty($comments) && strlen($comments) < 3) {
        $commentsErr = "Comments must be at least 3 characters";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<div class="all">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h2>Donor Information</h2>
    <br />

    <div class="form-group">
      <label for="firstname">First Name <h3>*</h3></label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>"  />
      <span class="error"><?php echo $firstnameErr;?></span>
    </div>

    <div class="form-group">
      <label for="lastname">Last Name <h3>*</h3></label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>"  />
      <span class="error"><?php echo $lastnameErr;?></span>
    </div>

    <div class="form-group">
      <label for="company">Company</label>
      <input type="text" id="company" name="company" value="<?php echo $company; ?>" />
    </div>

    <div class="form-group">
      <label for="address1">Address 1 <h3>*</h3></label>
      <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>"  />
      <span class="error"><?php echo $address1Err;?></span>
    </div>

    <div class="form-group">
      <label for="address2">Address 2</label>
      <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>" />
    </div>

    <div class="form-group">
      <label for="city">City <h3>*</h3></label>
      <input type="text" id="city" name="city" value="<?php echo $city; ?>"  />
      <span class="error"><?php echo $cityErr;?></span>
    </div>

    <div class="form-group">
      <label for="state">State <h3>*</h3></label>
      <select name="state" id="state" >
        <option value="" disabled selected hidden>Select a State</option>
        <option value="dhaka" <?php if($state=="dhaka") echo "selected"; ?>>Dhaka</option>
        <option value="rajshahi" <?php if($state=="rajshahi") echo "selected"; ?>>Rajshahi</option>
        <option value="khulna" <?php if($state=="khulna") echo "selected"; ?>>Khulna</option>
        <option value="chittagong" <?php if($state=="chittagong") echo "selected"; ?>>Chittagong</option>
      </select>
      <span class="error"><?php echo $stateErr;?></span>
    </div>

    <div class="form-group">
      <label for="zip">Zipcode <h3>*</h3></label>
      <input type="text" id="zip" name="zip" value="<?php echo $zip; ?>"  />
      <span class="error"><?php echo $zipErr;?></span>
    </div>

    <div class="form-group">
      <label for="country">Country <h3>*</h3></label>
      <select name="country" id="country">
        <option value="" disabled selected hidden>Select a Country</option>
        <option value="Bangladesh" <?php if($country=="Bangladesh") echo "selected"; ?>>Bangladesh</option>
        <option value="India" <?php if($country=="India") echo "selected"; ?>>India</option>
        <option value="US" <?php if($country=="US") echo "selected"; ?>>US</option>
        <option value="Maldives" <?php if($country=="Maldives") echo "selected"; ?>>Maldives</option>
      </select>
      <span class="error"><?php echo $countryErr;?></span>
    </div>

    <div class="form-group">
      <label for="fax">Fax</label>
      <input type="text" id="fax" name="fax" value="<?php echo $fax; ?>" />
    </div>
    <div class="form-group">
      <label for="email">Email <h3>*</h3></label>
      <input type="email" id="email" name="email" value="<?php echo $email; ?>"  />
      <span class="error"><?php echo $emailErr;?></span>
    </div>

    <div class="form-group">
      <label>Donation Amount <h3>*</h3></label><br />
      <input type="radio" name="amount" value="None" <?php if($amount=="None") echo "checked"; ?>  />None
      <input type="radio" name="amount" value="50" <?php if($amount=="50") echo "checked"; ?> />$50
      <input type="radio" name="amount" value="75" <?php if($amount=="75") echo "checked"; ?> />$75
      <input type="radio" name="amount" value="100" <?php if($amount=="100") echo "checked"; ?> />$100
      <input type="radio" name="amount" value="250" <?php if($amount=="250") echo "checked"; ?> />$250
      <input type="radio" name="amount" value="Other" <?php if($amount=="Other") echo "checked"; ?> />Other
      <span class="error"><?php echo $amountErr;?></span>
    </div>

    <div class="form-group">
      <label for="other_amount"><strong>Other Amount $</strong>
        <small>(Check a button or type your amount)</small>
      </label>
      <input type="text" id="other_amount" name="other_amount" value="<?php echo $other_amount; ?>" />
      <span class="error"><?php echo $other_amountErr;?></span>
    </div>

    <div class="form-group">
      <label for="recurring">Recurring Donation</label>
      <input type="checkbox" id="recurring" name="recurring" value="yes" <?php if($recurring=="yes") echo "checked"; ?> />I am interested in giving on a regular.
      <br />
    </div>

    <div class="form-group">
      <label for="monthly_credit_card"></label>
      Monthly Credit Card $<input type="text" id="monthly_credit_card" name="monthly_credit_card" class="smallbox" value="<?php echo $monthly_credit_card; ?>" />for
      <input type="text" id="monthly_months" name="monthly_months" class="smallbox" value="<?php echo $monthly_months; ?>" />
      Month
      <span class="error"><?php echo $monthly_credit_cardErr;?></span>
      <span class="error"><?php echo $monthly_monthsErr;?></span>
    </div>

    <h2>Honorarium and Memorial Donation Information</h2>

    <div class="form-group">
      <label>I would like to make this donation:</label>
      <input type="radio" name="donation_type" value="honor" <?php if($donation_type=="honor") echo "checked"; ?> />To honor
      <input type="radio" name="donation_type" value="memory" <?php if($donation_type=="memory") echo "checked"; ?> /> In memory of
      <span class="error"><?php echo $donation_typeErr;?></span>
    </div>

    <div class="form-group">
      <label for="honor_name">Name</label>
      <input type="text" id="honor_name" name="honor_name" value="<?php echo $honor_name; ?>" />
      <span class="error"><?php echo $honor_nameErr;?></span>
    </div>

    <div class="form-group">
      <label for="acknowledge">Acknowledge Donation to</label>
      <input type="text" id="acknowledge" name="acknowledge" value="<?php echo $acknowledge; ?>" />
      <span class="error"><?php echo $acknowledgeErr;?></span>
    </div>

    <div class="form-group">
      <label for="honor_address">Address</label>
      <input type="text" id="honor_address" name="honor_address" value="<?php echo $honor_address; ?>" />
      <span class="error"><?php echo $honor_addressErr;?></span>
    </div>

    <div class="form-group">
      <label for="honor_city">City</label>
      <input type="text" id="honor_city" name="honor_city" value="<?php echo $honor_city; ?>" />
      <span class="error"><?php echo $honor_cityErr;?></span>
    </div>

    <div class="form-group">
      <label for="honor_state">State:</label>
      <select name="honor_state" id="honor_state">
        <option value="" disabled selected hidden>Select a State</option>
        <option value="dhaka" <?php if($honor_state=="dhaka") echo "selected"; ?>>Dhaka</option>
        <option value="rajshahi" <?php if($honor_state=="rajshahi") echo "selected"; ?>>Rajshahi</option>
        <option value="khulna" <?php if($honor_state=="khulna") echo "selected"; ?>>Khulna</option>
        <option value="chittagong" <?php if($honor_state=="chittagong") echo "selected"; ?>>Chittagong</option>
      </select>
      <span class="error"><?php echo $honor_stateErr;?></span>
    </div>

    <div class="form-group">
      <label for="honor_zip">Zip</label>
      <input type="text" id="honor_zip" name="honor_zip" value="<?php echo $honor_zip; ?>" />
      <span class="error"><?php echo $honor_zipErr;?></span>
    </div>

    <h2>Additional Information</h2>
    <p>
      Please enter your name, company or organization as you would like it to appear in our publications:
    </p>

    <div class="form-group">
      <label for="additional_name">Name</label>
      <input type="text" id="additional_name" name="additional_name" value="<?php echo $additional_name; ?>" />
      <span class="error"><?php echo $additional_nameErr;?></span>
    </div>

    <div>
      <input type="checkbox" name="anonymous_gift" value="yes" <?php if($anonymous_gift=="yes") echo "checked"; ?> />I would like my gift to remain anonymous.
      <br />
      <input type="checkbox" name="matching_gift" value="yes" <?php if($matching_gift=="yes") echo "checked"; ?> />My employer offers a matching gift program. I will mail the matching gift form.
      <br />
      <input type="checkbox" name="no_thank_you" value="yes" <?php if($no_thank_you=="yes") echo "checked"; ?> />Please save the cost Of acknowledging this gift by not mailing a thank you letter.
      <br /><br />
    </div>

    <div class="form-group">
      <label for="comments"><strong>Comments</strong>
        <small>(Please type any questions or feedback here)</small><br /></label>
      <textarea id="comments" name="comments" rows="4"><?php echo $comments; ?></textarea>
      <span class="error"><?php echo $commentsErr;?></span>
    </div>

    <div class="form-group">
      <label><strong>How may we contact you?</strong></label><br />
      <div>
        <input type="checkbox" name="contact[]" value="email" <?php if(is_array($contact) && in_array("email", $contact)) echo "checked"; ?> />E-mail<br />
        <input type="checkbox" name="contact[]" value="postal" <?php if(is_array($contact) && in_array("postal", $contact)) echo "checked"; ?> /> Postal Mail<br />
        <input type="checkbox" name="contact[]" value="telephone" <?php if(is_array($contact) && in_array("telephone", $contact)) echo "checked"; ?> /> Telephone<br />
        <input type="checkbox" name="contact[]" value="fax" <?php if(is_array($contact) && in_array("fax", $contact)) echo "checked"; ?> /> Fax<br />
      </div>
    </div>

    <p>
      I would like to receive newsletters and information about special events by:
    </p>
    <br />

    <div class="form-group">
      <label></label><br />
      <div>
        <input type="checkbox" name="newsletter[]" value="email" <?php if(is_array($newsletter) && in_array("email", $newsletter)) echo "checked"; ?> />E-mail<br />
        <input type="checkbox" name="newsletter[]" value="postal" <?php if(is_array($newsletter) && in_array("postal", $newsletter)) echo "checked"; ?> /> Postal Mail<br />
      </div>
    </div>

    <div>
      <input type="checkbox" name="anonymous_gift_2" value="yes" <?php if($anonymous_gift_2=="yes") echo "checked"; ?> />I would like my gift to remain anonymous.
      <br />
    </div>

    <div id="submit">
      <input type="reset" value="Reset" />
      <input type="submit" value="Continue" />
    </div>
  </form>
</div>
</body>
</html>
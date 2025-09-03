<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
    <title>Document</title>
</head>
<body>

<?php

$firstname = $lastname = $company = $address1 = $address2 = $city = $state = $zip = $country = $fax = $mail = $amount = $donationType = $honorName = $acknowledge = $honorAddress = $honorCity = $honorState = $honorZip = $additionalName = $comments = "";
$contactEmail = $contactPostal = $contactTelephone = $contactFax = $newsletterEmail = $newsletterPostal = $anonymousGift = $matchingGift = $noThankYou = $monthlyCreditCard = $monthlyMonths = "";

$firstnameErr = $lastnameErr = $companyErr = $address1Err = $address2Err = $cityErr = $stateErr = $zipErr = $countryErr = $faxErr = $mailErr = $amountErr = $donationTypeErr = $honorNameErr = $acknowledgeErr = $honorAddressErr = $honorCityErr = $honorStateErr = $honorZipErr = $additionalNameErr = $commentsErr = $contactEmailErr = $contactPostalErr = $contactTelephoneErr = $contactFaxErr = $newsletterEmailErr = $newsletterPostalErr = $anonymousGiftErr = $matchingGiftErr = $noThankYouErr = $monthlyCreditCardErr = $monthlyMonthsErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
    $mail = test_input($_POST["mail"] ?? "");
    $amount = test_input($_POST["amount"] ?? "");


    $donationType = test_input($_POST["donation"] ?? "");
    $monthlyCreditCard = test_input($_POST["monthlyCreditCard"] ?? "");
    $monthlyMonths = test_input($_POST["monthlyMonths"] ?? "");

    $honorName = test_input($_POST["honorName"] ?? "");
    $acknowledge = test_input($_POST["acknowledge"] ?? "");
    $honorAddress = test_input($_POST["honorAddress"] ?? "");
    $honorCity = test_input($_POST["honorCity"] ?? "");
    $honorState = test_input($_POST["honorState"] ?? "");
    $honorZip = test_input($_POST["honorZip"] ?? "");

    $additionalName = test_input($_POST["additionalName"] ?? "");
    $comments = test_input($_POST["comments"] ?? "");

    $contactEmail = isset($_POST["contactEmail"]) ? "checked" : "";
    $contactPostal = isset($_POST["contactPostal"]) ? "checked" : "";
    $contactTelephone = isset($_POST["contactTelephone"]) ? "checked" : "";
    $contactFax = isset($_POST["contactFax"]) ? "checked" : "";

    $newsletterEmail = isset($_POST["newsletterEmail"]) ? "checked" : "";
    $newsletterPostal = isset($_POST["newsletterPostal"]) ? "checked" : "";

    $anonymousGift = isset($_POST["anonymousGift"]) ? "checked" : "";
    $matchingGift = isset($_POST["matchingGift"]) ? "checked" : "";
    $noThankYou = isset($_POST["noThankYou"]) ? "checked" : "";


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
        $address1Err = "Address is required";
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
        $zipErr = "Zip is required";
    } elseif (!preg_match("/^[0-9]*$/", $zip)) {
        $zipErr = "Only numbers are allowed";
    }

    if (empty($country)) {
        $countryErr = "Country is required";
    }

    if (empty($mail)) {
        $mailErr = "Email is required";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailErr = "Invalid email format";
    }

    if (empty($amount)) {
        $amountErr = "Amount is required";
    } elseif (!preg_match("/^[0-9]*$/", $amount)) {
        $amountErr = "Only numbers are allowed";
    }
}

function test_input($data) {
    
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h3>*</h3>Denotes Required Information

<div class="head">
    <a href="">> 1 Donation</a>
    <a href="">> 2 Confirmation</a>
    <a href="">> Thank You!</a>
</div>

<div class="all">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h2>Donor Information</h2><br>

        <div class="form-group">
            <label for="firstname">First Name <h3>*</h3></label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" >
            <span style="color:red"><?php echo $firstnameErr;?></span>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name<h3>*</h3></label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" >
            <span style="color:red"><?php echo $lastnameErr;?></span>
        </div>

        <div class="form-group">
            <label for="company">Company</label>
            <input type="text" id="company" name="company" value="<?php echo $company; ?>">
        </div>

        <div class="form-group">
            <label for="address1">Address 1<h3>*</h3></label>
            <input type="text" id="address1" name="address1" value="<?php echo $address1; ?>" >
            <span style="color:red"><?php echo $address1Err;?></span>
        </div>

        <div class="form-group">
            <label for="address2">Address 2</label>
            <input type="text" id="address2" name="address2" value="<?php echo $address2; ?>">
        </div>

        <div class="form-group">
            <label for="city">City<h3>*</h3></label>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>" >
            <span style="color:red"><?php echo $cityErr;?></span>
        </div>

        <div class="form-group">
            <label for="state">State<h3>*</h3></label>
            <select name="state" id="state" >
                <option value="" disabled selected hidden>Select a State</option>
                <option value="Dhaka" <?php if($state=="Dhaka") echo "selected"; ?>>Dhaka</option>
                <option value="Rajshahi" <?php if($state=="Rajshahi") echo "selected"; ?>>Rajshahi</option>
                <option value="Khulna" <?php if($state=="Khulna") echo "selected"; ?>>Khulna</option>
                <option value="Chittagong" <?php if($state=="Chittagong") echo "selected"; ?>>Chittagong</option>
            </select>
            <span style="color:red"><?php echo $stateErr;?></span>
        </div>

        <div class="form-group">
            <label for="zip">Zipcode<h3>*</h3></label>
            <input type="text" id="zip" name="zip" value="<?php echo $zip; ?>" >
            <span style="color:red"><?php echo $zipErr;?></span>
        </div>

        <div class="form-group">
            <label for="country">Country<h3>*</h3></label>
            <select name="country" id="country" >
                <option value="" disabled selected hidden>Select a Country</option>
                <option value="Bangladesh" <?php if($country=="Bangladesh") echo "selected"; ?>>Bangladesh</option>
                <option value="India" <?php if($country=="India") echo "selected"; ?>>India</option>
                <option value="US" <?php if($country=="US") echo "selected"; ?>>US</option>
                <option value="Maldives" <?php if($country=="Maldives") echo "selected"; ?>>Maldives</option>
            </select>
            <span style="color:red"><?php echo $countryErr;?></span>
        </div>

        <div class="form-group">
            <label for="fax">Fax</label>
            <input type="text" id="fax" name="fax" value="<?php echo $fax; ?>">
        </div>
        <div class="form-group">
            <label for="mail">Email<h3>*</h3></label>
            <input type="text" id="mail" name="mail" value="<?php echo $mail; ?>" >
            <span style="color:red"><?php echo $mailErr;?></span>
        </div>

        <div class="form-group">
            <label>Donation Amount<h3>*</h3></label><br>
            <input type="radio" name="amount" value="None" <?php if($amount=="None") echo "checked"; ?>>None
            <input type="radio" name="amount" value="50" <?php if($amount=="50") echo "checked"; ?>>$50
            <input type="radio" name="amount" value="75" <?php if($amount=="75") echo "checked"; ?>>$75
            <input type="radio" name="amount" value="100" <?php if($amount=="100") echo "checked"; ?>>$100
            <input type="radio" name="amount" value="250" <?php if($amount=="250") echo "checked"; ?>>$250
            <input type="radio" name="amount" value="Other" <?php if($amount=="Other") echo "checked"; ?>>Other
            <span style="color:red"><?php echo $amountErr;?></span>
        </div>

        <div class="form-group">
            <label for="amount">
                <strong>Other Amount $</strong>
                <small>(Check a button or type your amount)</small>
            </label>
            <input type="number" id="amount" name="amount" value="<?php echo $amount; ?>">
        </div>

        <div class="form-group">
            <label>Recurring Donation</label>
            <input type="checkbox" name="monthlyCreditCard" <?php echo $monthlyCreditCard; ?>>I am interested in giving on a regular. <br>
        </div>

        <div class="form-group">
            <label></label>
            Monthly Credit Card $<input type="number" name="monthlyCreditCard" class="smallbox" value="<?php echo $monthlyCreditCard; ?>">for<input type="number" name="monthlyMonths" class="smallbox" value="<?php echo $monthlyMonths; ?>"> Month
        </div>

        <h2>Honorarium and Memorial Donation Information</h2>

        <div class="form-group">
            <label>I would like to make this donation:</label>
            <input type="radio" name="donationType" value="honor" <?php if($donationType=="honor") echo "checked"; ?>>To honor 
            <input type="radio" name="donationType" value="memory" <?php if($donationType=="memory") echo "checked"; ?>> In memory of
        </div>

        <div class="form-group">
            <label for="honorName">Name</label>
            <input type="text" id="honorName" name="honorName" value="<?php echo $honorName; ?>">
        </div>

        <div class="form-group">
            <label for="acknowledge">Acknowledge Donation to</label>
            <input type="text" id="acknowledge" name="acknowledge" value="<?php echo $acknowledge; ?>">
        </div>

        <div class="form-group">
            <label for="honorAddress">Address</label>
            <input type="text" id="honorAddress" name="honorAddress" value="<?php echo $honorAddress; ?>">
        </div>

        <div class="form-group">
            <label for="honorCity">City</label>
            <input type="text" id="honorCity" name="honorCity" value="<?php echo $honorCity; ?>">
        </div>

        <div class="form-group">
            <label for="honorState">State:</label>
            <select name="honorState" id="honorState">
                <option value="" disabled selected hidden>Select a State</option>
                <option value="Dhaka" <?php if($honorState=="Dhaka") echo "selected"; ?>>Dhaka</option>
                <option value="Rajshahi" <?php if($honorState=="Rajshahi") echo "selected"; ?>>Rajshahi</option>
                <option value="Khulna" <?php if($honorState=="Khulna") echo "selected"; ?>>Khulna</option>
                <option value="Chittagong" <?php if($honorState=="Chittagong") echo "selected"; ?>>Chittagong</option>
            </select>
        </div>

        <div class="form-group">
            <label for="honorZip">Zip</label>
            <input type="number" id="honorZip" name="honorZip" value="<?php echo $honorZip; ?>">
        </div>

        <h2>Additional Information</h2>
        <p>Please enter your name, company or organization as you would like it to appear in our publications:</p>

        <div class="form-group">
            <label for="additionalName">Name</label>
            <input type="text" id="additionalName" name="additionalName" value="<?php echo $additionalName; ?>">
        </div>

        <div>
            <input type="checkbox" name="anonymousGift" <?php echo $anonymousGift; ?>>I would like my gift to remain anonymous. <br>
            <input type="checkbox" name="matchingGift" <?php echo $matchingGift; ?>>My employer offers a matching gift program. I will mail the matching gift form. <br>
            <input type="checkbox" name="noThankYou" <?php echo $noThankYou; ?>>Please save the cost Of acknowledging this gift by not mailing a thank you letter. <br> <br>
        </div>

        <div class="form-group">
            <label><strong>Comments</strong><small>(Please type any questions or feedback here)</small><br></label>
            <textarea id="comments" name="comments" rows="4"><?php echo $comments; ?></textarea>
        </div>

        <div class="form-group">
            <label><strong>How may we contact you?</strong></label><br>
            <div>
                <input type="checkbox" name="contactEmail" <?php echo $contactEmail; ?>>E-mail<br>
                <input type="checkbox" name="contactPostal" <?php echo $contactPostal; ?>> Postal Mail<br>
                <input type="checkbox" name="contactTelephone" <?php echo $contactTelephone; ?>> Telephone<br>
                <input type="checkbox" name="contactFax" <?php echo $contactFax; ?>> Fax<br>
            </div>
        </div>

        <p>I would like to receive newsletters and information about special events by:</p> <br>

        <div class="form-group">
            <label></label><br>
            <div>
                <input type="checkbox" name="newsletterEmail" <?php echo $newsletterEmail; ?>>E-mail<br>
                <input type="checkbox" name="newsletterPostal" <?php echo $newsletterPostal; ?>> Postal Mail<br>
            </div>
        </div>

        <div>
            <input type="checkbox" name="anonymousGift" <?php echo $anonymousGift; ?>>I would like my gift to remain anonymous. <br>
        </div>

        <div id="submit">
            <input type="reset" value="Reset">
            <input type="submit" value="Continue">
        </div>
    </form>
</div>


</body>
</html>
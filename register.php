<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php 
require('accessclass.php');
require('userClass.php');
require('customerClass.php');
require('contactClass.php');
require('addressClass.php');
require('ProductSelect.php');
require('ProductClass.php');
require('cartSelect.php');
require('cart.php');
require('adminClass.php');
session_start();
ob_start();
if ($_SESSION["USERNAME"] == "Guest")
{
$err = 0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
	include 'styles.php';
?>	
  </head>
  
<body>

<div id="header">

<div class="container">
<?php
	include 'topnavbar.php';
?>
<!-- Navbar ================================================== -->
<?php
	include 'navbar.php';
?>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php
include 'sidebar.php';
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.php">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>	
	<div class="well">
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-horizontal">
		<h4>Your personal information</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">First name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" name="fname" placeholder="First Name" value="<?php if (!empty($_POST)) echo $_POST["fname"]; ?>">
			</div>
		 </div>
		 <div class="control-group">
			<label class="control-label" for="inputLnam">Last name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputLnam" name="lname" placeholder="Last Name" value="<?php if (!empty($_POST)) echo $_POST["lname"]; ?>">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" name="email" placeholder="Email" value="<?php if (!empty($_POST)) echo $_POST["email"]; ?>">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" name="password" placeholder="Password">
		</div>
	  </div>	  
<?php
$titleErr = $fnameErr = $lnameErr = $emailErr = $passwordErr = $dobErr = "";
$title = $fname = $lname = $email = $password /*= $dob*/ = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	if (empty($_POST["fname"])) {
		$fnameErr = "<sup>*</sup>First name is required </br>";
	} else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["fname"])) {
	$fnameErr = "<sup>*</sup>Only letters are allowed for first name</br>"; 
	}
	  
	if (empty($_POST["lname"])) {
		$lnameErr = "<sup>*</sup>Last name is required </br>";
	} else if (!preg_match("/^[a-zA-Z ]*$/",$_POST["lname"])) {
		$lnameErr = "<sup>*</sup>Only letters are allowed for last name</br>"; 
		}

	if (empty($_POST["email"])) {
		$emailErr = "<sup>*</sup>Email is required </br>";
	}else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		echo $emailErr = "<sup>*</sup>Invalid email format  </br>"; 
	}

	if (empty($_POST["password"])) {
		$passwordErr = "<sup>*</sup>Password is required  </br>";
	}

	if ($titleErr != "" || $fnameErr != "" || $lnameErr != "" || $emailErr != "" || $passwordErr != "" || $dobErr != "") {
		$err = 1;
	?>
		<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Please fill in the required fields</strong></br> <?php echo /*$titleErr.*/$fnameErr.$lnameErr.$emailErr.$passwordErr/*.$dobErr*/;?>
		 </div>
<?php
	}
}
?>
		<h4>Your address</h4>
		
		<div class="control-group">
			<label class="control-label" for="company">Company</label>
			<div class="controls">
			  <input type="text" id="company" name="company" placeholder="company" value="<?php if (!empty($_POST)) echo $_POST["company"]; ?>" />
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="address">Address<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address" name="address" placeholder="Address" value="<?php if (!empty($_POST)) echo $_POST["address"]; ?>"/> <span>Street address, P.O. box, company name, c/o</span>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="address2">Address (Line 2)<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="address2" name="address1" placeholder="Adress line 2" value="<?php if (!empty($_POST)) echo $_POST["address1"]; ?>"/> <span>Apartment, suite, unit, building, floor, etc.</span>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">City<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="city" name="city" placeholder="city" value="<?php if (!empty($_POST)) echo $_POST["city"]; ?>"/> 
			</div>
		</div>		
		<div class="control-group">
			<label class="control-label" for="postcode">Zip / Postal Code<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="postcode" name="zip" placeholder="Zip / Postal Code" value="<?php if (!empty($_POST)) echo $_POST["zip"]; ?>"/> 
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="country">Country<sup>*</sup></label>
			<div class="controls">
			<select id="country" name="country">
				<option value="">-</option>
				<option value="1">South Africa</option>
			</select>
			</div>
		</div>	
		<div class="control-group">
			<label class="control-label" for="phone">Home phone <sup>*</sup></label>
			<div class="controls">
			  <input type="text"  name="hphone" id="phone" placeholder="phone" value="<?php if (!empty($_POST)) echo $_POST["hphone"]; ?>"/> <span>You must register at least one phone number</span>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="mobile">Mobile Phone </label>
			<div class="controls">
			  <input type="text"  name="cphone" id="mobile" placeholder="Mobile Phone" value="<?php if (!empty($_POST)) echo $_POST["cphone"]; ?>"/> 
			</div>
		</div>
		
	<p><sup>*</sup>Required field	</p>
<?php

$fname1Err = $lname1Err = $addressErr = $cityErr = $zipErr = $countryErr = $hphoneErr = $cphoneErr = "";
$fname1 = $lname1 = $company = $address = $address1 = $city = $zip = $country = $hphone = $cphone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["address"])) {
		$addressErr = "<sup>*</sup>Address is required </br>";
	}

	if (empty($_POST["city"])) {
		$cityErr = "<sup>*</sup>City is required  </br>";
	}

	if (empty($_POST["zip"])) {
		$zipErr = "<sup>*</sup>Zip/Postal Code is required </br>";
	}
	
	if (empty($_POST["country"])) {
		$countryErr = "<sup>*</sup>Country is required </br>";
	}

	if (empty($_POST["hphone"])) {
		$hphoneErr = "<sup>*</sup>Home phone number is required </br>";
	} else if (!is_numeric($_POST["hphone"])){
		$hphoneErr = "<sup>*</sup>Home phone number is not in an number format</br>";
	}


	if (empty($_POST["cphone"])) {
		$cphoneErr = "<sup>*</sup>Mobile phone number is required  </br>";
	}else if (!is_numeric($_POST["cphone"])){
		$cphoneErr = "<sup>*</sup>Mobile phone number is not in an number format</br>";
	}

	if ($fname1Err != "" || $lname1Err != "" || $addressErr != "" || $cityErr != "" || $zipErr != "" || $countryErr != "" || $hphoneErr != "" || $cphoneErr != "") {
	$err = 1;
	?>
		<div class="alert alert-block alert-error fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Please fill in the required fields</strong></br> <?php echo /*$fname1Err.$lname1Err.*/$addressErr.$cityErr.$zipErr.$countryErr.$hphoneErr.$cphoneErr;?>
		 </div>
<?php
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if ($err === 0)
	{
		$access = new Access();
		$user = new User();
		$customer = new Customer();
		$contact = new Contact();
		$address = new Address();
		
		$user->setEmailAddress($_POST["email"]);
		$user->setPassword(md5($_POST["password"]));
		$customer->setFirstName($_POST["fname"]);
		$customer->setLastName($_POST["lname"]);
		$customer->setEmailAddress($_POST["email"]);
		$contact->setTelephonenumber($_POST["hphone"]);
		$contact->setCellPhonenumber($_POST["cphone"]);
		$address->setAddress1($_POST["address"]);
		$address->setAddress2($_POST["address1"]);
		$address->setCity($_POST["city"]);
		$address->setPostCode($_POST["zip"]);
		$address->setCountry($_POST["country"]);
		
		$err = $access->register($user,$customer,$contact,$address);
		ob_end_flush();
	}
	
	if ($err === 2)
	{
		?>
		<div class="alert fade in">
			<button type="button" class="close" data-dismiss="alert">×</button>
			e-mail address "<strong><?php echo $_POST['email']; ?></strong>" already in use please try a different e-mail address or try login
		</div>
		
		<?php
	}
}
?>
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Register"  formmethod="post"/>
			</div>
		</div>		
	

</form>
</div>
</div>
</div>
</div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php
include 'script.php';
?>
</form>
</body>
</html>
<?php 
}
?>	
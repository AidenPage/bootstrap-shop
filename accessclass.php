<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Access
{

    public function loggin($val,$val1)
    {
		$user = $val;
		$main = $val1;
		$cartSelect = new cartSelect();
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		if($user->getEmailAddress() != "ADMIN"){
        	$sql = "SELECT user.emailaddress, user.password, user.role, customer.CustomerID, customer.FirstName, customer.LastName FROM user join customer on user.emailaddress = customer.EmailAddress  where user.emailaddress = '".$user->getEmailAddress()."' AND user.Password = '".$user->getPassword()."';";
			$result = mysql_query($sql);
			if ($row = mysql_fetch_array($result)) {
				$_SESSION["USERNAME"] = $row['FirstName']." ".$row['LastName'];
				$_SESSION["CustomerID"] = $row['CustomerID'];
				$_SESSION["ROLE"] = $row['role'];
				$sql = "SELECT cart.cartid FROM cart where cart.CustomerID = '".$row['CustomerID']."';";
				$result = mysql_query($sql);
				$row = mysql_fetch_array($result);
				$_SESSION["cartID"] = $row['cartid'];
				$cartSelect->guestToUserCart();
				if($main === true)
				header('Location: index.php');
			} else {
				 return $incorrectpass = true;
			}
		}else{
			
			$sql = "SELECT user.emailaddress, user.password, user.role FROM user where user.emailaddress = '".$user->getEmailAddress()."' AND user.Password = '".$user->getPassword()."';";
			$result = mysql_query($sql);
			if ($row = mysql_fetch_array($result)) {
				$_SESSION["USERNAME"] = $row['emailaddress'];
				$_SESSION["ROLE"] = $row['role'];
				if($main === true)
				header('Location: admin.php');
			}else
				 return $incorrectpass = true;
	
		}
		mysql_close($DBConnect);
	}

    public function logout()
    {
        session_destroy();
		header('Location: index.php');
		exit;
    }
	
	public function register($val, $val1, $val2, $val3)
	{
		$user = $val;
		$customer = $val1;
		$contact = $val2;
		$address = $val3;
		
		$last_id = $last_id1 = "";

		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		
		//Insert record in user
			$sql = "INSERT INTO user (emailaddress, password, role)
					VALUES ('".$user->getEmailAddress()."','".$user->getPassword()."', 'CUSTOMER');";
			if (mysql_query($sql) === TRUE) {
			
			}else{
			return 2;
			}
		
		//Insert record in customer
        	$sql = "INSERT INTO customer (firstname, lastname, emailaddress)
					VALUES ('".$customer->getFirstName()."','".$customer->getLastName()."', '".$customer->getEmailAddress()."');";
			
			if (mysql_query($sql) === TRUE) {
				$last_id = mysql_insert_id();
			}else
			echo 'failed </br>';
		
		//Insert record in cart
			$sql = "INSERT INTO cart (customerID)
					VALUES ('".$last_id."');";

			if (mysql_query($sql) === TRUE) {
				
			}else
			echo 'failed </br>';	
		
		
		//Insert record in contact
			$sql = "INSERT INTO contact (telephonenumber, cellphonenumber)
					VALUES ('".$contact->getTelephonenumber()."','".$contact->getCellPhonenumber()."');";

			if (mysql_query($sql) === TRUE) {
				$last_id1 = mysql_insert_id();
			}else
			echo 'failed </br>';
		
		//Insert record in customercontact
			$sql = "INSERT INTO customercontact (customerID, contactID)
					VALUES ('".$last_id."','".$last_id1."');";

			if (mysql_query($sql) === TRUE) {
				
			}else
			echo 'failed </br>';
			
			
		//Insert record in address	
			$sql = "INSERT INTO address (address1, address2, city, postcode, country)
					VALUES ('".$address->getAddress1()."', '".$address->getAddress2()."','".$address->getCity()."', '".$address->getPostCode()."', '".$address->getCountry()."');";
			if (mysql_query($sql) === TRUE) {
				$last_id1 = mysql_insert_id();
			}else
			echo 'failed </br>';

		//Insert record in customeraddress		
			$sql = "INSERT INTO customeraddress (customerID, addressID)
					VALUES ('".$last_id."','".$last_id1."');";

			if (mysql_query($sql) === TRUE) {
			}else
			echo 'failed </br>';
			
			$this->loggin($user,true);
			return 0;
	}
}
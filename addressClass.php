<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Address
{
	protected $AddressID = "";
	protected $Address1 = "";
	protected $Address2 = "";
	protected $City = "";
	protected $PostCode = "";
	protected $Country = "";
	
	
	
	function setAddressID ($val){
		$this->AddressID = $val;
	}
	
	function setAddress1 ($val){
		$this->Address1 = $val;
	}
	
	function setAddress2 ($val){
		$this->Address2 = $val;
	}
	
	function setCity ($val){
		$this->City = $val;
	}
	
	function setPostCode ($val){
		$this->PostCode = $val;
	}
	
	function setCountry($val){
		$this->Country = $val;
	}
	
	function getAddressID (){
		return $this->AddressID;
	}
	
	function getAddress1 (){
		return $this->Address1;
	}
	
	function getAddress2 (){
		return $this->Address2;
	}
	
	function getCity (){
		return $this->City;
	}
	
	function getPostCode (){
		return $this->PostCode;
	}
	
	function getCountry (){
		return $this->Country;
	}
}
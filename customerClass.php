<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Customer
{
	protected $CustomerID = "";
	protected $FirstName = "";
	protected $LastName = "";
	protected $EmailAddress = "";
	
	
	function setCustomerID ($val){
		$this->CustomerID = $val;
	}
	
	function setFirstName ($val){
		$this->FirstName = $val;
	}
	
	function setLastName ($val){
		$this->LastName = $val;
	}
	
	function setEmailAddress ($val){
		$this->EmailAddress = $val;
	}
	
	function getCustomerID (){
		return $this->CustomerID;
	}
	
	function getFirstName (){
		return $this->FirstName;
	}
	
	function getLastName (){
		return $this->LastName;
	}
	
	function getEmailAddress (){
		return $this->EmailAddress;
	}
}
<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php
class User
{
	protected $EmailAddress = "";
	protected $Password = "";
	protected $Role = "";
	
	function setEmailAddress ($val){
		$this->EmailAddress = $val;
	}
	
	function setPassword ($val){
		$this->Password = $val;
	}
	
	function setRole ($val){
		$this->Role = $val;
	}
	
	function getEmailAddress (){
		return $this->EmailAddress;
	}
	
	function getPassword (){
		return $this->Password;
	}
	
	function getRole (){
		return $this->Role;
	}
	
	
}
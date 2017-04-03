<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Contact
{
	protected $ContactID = "";
	protected $Telephonenumber = "";
	protected $CellPhonenumber = "";
	
	
	function setContactID ($val){
		$this->ContactID = $val;
	}
	
	function setTelephonenumber ($val){
		$this->Telephonenumber = $val;
	}
	
	function setCellPhonenumber ($val){
		$this->CellPhonenumber = $val;
	}
	
	function getContactID (){
		return $this->ContactID;
	}
	
	function getTelephonenumber (){
		return $this->Telephonenumber;
	}
	
	function getCellPhonenumber (){
		return $this->CellPhonenumber;
	}
}
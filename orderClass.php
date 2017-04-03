<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Order{
	protected $OrderID;
	protected $CustomerID;
	protected $TotalAmount;
	protected $OrderDate;

	public function setOrderID($val){
		$this->OrderID = $val;
	}

	public function setCustomerID($val){
		$this->CustomerID = $val;
	}

	public function setTotalAmount($val){
		$this->TotalAmount = $val;
	}

	public function setOrderDate($val){
		$this->OrderDate = $val;
	}
		
	public function getOrderID(){
		return $this->OrderID;
	}

	public function getCustomerID(){
		return $this->CustomerID;
	}

	public function getTotalAmount(){
		return $this->TotalAmount;
	}

	public function getOrderDate(){
		return $this->OrderDate;
	}
	
}
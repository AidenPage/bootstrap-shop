<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Cart
{

	protected $CartId;
	protected $ProductId;
	protected $Quantity;

	public function setCartId($val){
		$this->CartId = $val;
	}

	public function setProductId($val){
		$this->ProductId = $val;
	}
	
	public function setQuantity($val){
		$this->Quantity = $val;
	}
	
	public function getCartId(){
		return $this->CartId;
	}

	public function getProductId(){
		return $this->ProductId;
	}
	
	public function getQuantity(){
		return $this->Quantity;
	}
}
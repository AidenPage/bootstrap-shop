<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

abstract class Product{
	protected $ProductID;
	protected $ProductCat;
	protected $ProductName;
	protected $ProductDestription;
	protected $Price;
	protected $Quantity;
	protected $SupplierID;
	protected $PictureURL;
	protected $Status;

	public function setProductID($val){
		$this->ProductID = $val;
	}

	public function setProductCat($val){
		$this->ProductCat = $val;
	}

	public function setProductName($val){
		$this->ProductName = $val;
	}

	public function setProductDestription($val){
		$this->ProductDestription = $val;
	}

	public function setPrice($val){
		$this->Price = $val;
	}

	public function setQuantity($val){
		$this->Quantity = $val;
	}

	public function setSupplierID($val){
		$this->SupplierID = $val;
	}

	public function setPictureURL($val){
		$this->PictureURL = $val;
	}

	public function setStatus($val){
		$this->Status = $val;
	}
		
	public function getProductID(){
		return $this->ProductID;
	}

	public function getProductCat(){
		return $this->ProductCat;
	}

	public function getProductName(){
		return $this->ProductName;
	}

	public function getProductDestription(){
		return $this->ProductDestription;
	}

	public function getPrice(){
		return $this->Price;
	}

	public function getQuantity(){
		return $this->Quantity;
	}

	public function getSupplierID(){
		return $this->SupplierID;
	}

	public function getPictureURL(){
		return $this->PictureURL;
	}

	public function getStatus(){
		return $this->Status;
	}
	
}

class Games extends Product{
	protected $Platform;
	protected $Gendre;

	public function setPlatform($val){
		$this->Platform = $val;
	}

	public function setGendre($val){
		$this->Gendre = $val;
	}
	
	public function getPlatform(){
		return $this->Platform;
	}

	public function getGendre(){
		return $this->Gendre;
	}
}

class accessories extends Product{
	protected $Platform;

	public function setPlatform($val){
		$this->Platform = $val;
	}
	
	public function getPlatform(){
		return $this->Platform;
	}
}

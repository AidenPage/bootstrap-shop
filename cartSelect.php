<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php
class cartSelect
{
	public function cartInsert($val)
	{
		$productSelect = new ProductSelect();
		$cart = new Cart();
		
		$id = $val;
		
		if(empty($_SESSION['cartprod']))
		$_SESSION['cartprod'] = array();
		
		foreach ($id as $ids){
			$product = $productSelect->getProductsAll($ids->getProductId());
			array_push($_SESSION['cartprod'],$product);
			array_push($_SESSION['cartprod'],$ids);
		}
	}
	
	public function cartInsertid($val,$val1)
	{
		$cart = new Cart();
		
		if(empty($_SESSION['cartprodid']))
		$_SESSION['cartprodid'] = array();

	
		$cart->setCartId($_SESSION["cartID"]);
		$cart->setProductId($val);
		$cart->setQuantity($val1);
		
		array_push($_SESSION['cartprodid'],$cart);
	}
	
	public function getCartProducts($val)
	{
		$cartID = $val;
		$carts = array();
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
        	$sql = "SELECT cartdetails.productid, cartdetails.quantity from cartdetails where cartdetails.cartid = ".$cartID;
			$result = mysql_query($sql);
			while ($row = mysql_fetch_array($result)) {
				$cart = new Cart();
				$cart->setproductid($row['productid']);
				$cart->setquantity($row['quantity']);
				array_push($carts, $cart);
			}
				
			mysql_close($DBConnect);
			
			return $carts;
	}
	
	public function InsertToCartDB($val)
    {
		
		$carts = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);

		foreach($carts as $cart)
		{
			$sql = "select cartID, productID, quantity from cartdetails where  cartID =".$cart->getCartId()." and productID = ".$cart->getProductId();
			$result = mysql_query($sql);
			if(mysql_num_rows($result) == 0){
        	$sql = "insert into cartdetails values (".$cart->getCartId().",".$cart->getProductId().",".$cart->getQuantity().");";
			if (mysql_query($sql) === true){			
			}
			}
			else
			{
				$sql = "update cartdetails set quantity = quantity+".$cart->getQuantity()." where  cartID = ".$cart->getCartId()." and productID = ".$cart->getProductId();
				if (mysql_query($sql) === true){			
				}
			}

		}
			mysql_close($DBConnect);	
    }
	
	public function cartupdate($val,$val1,$val2){
		
		$cartid = $val;
		$ProductID = $val1;
		$quantity = $val2;
		
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
		$sql = "UPDATE cartdetails SET quantity = '".$quantity."' WHERE ProductID = ".$ProductID." and cartid = ".$cartid;
		if (mysql_query($sql) === TRUE) {
		}

	}
	
	public function cartdelete($val,$val1){
		
		$cartid = $val;
		$ProductID = $val1;
		
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
		$sql = "delete from cartdetails WHERE ProductID = ".$ProductID." and cartid = ".$cartid;
		if (mysql_query($sql) === TRUE) {
		}

	}
	
	public function guestToUserCart(){
		
		if(!empty($_SESSION['cartprodid']))
		{
			
			for($i = 0; $i < sizeof($_SESSION['cartprodid']); $i++){
				$cart = new Cart();
				$cartGuest = new Cart();
				$cartGuest = $_SESSION["cartprodid"][$i];
				
				$cart->setCartId($_SESSION["cartID"]);
				$cart->setProductId($cartGuest->getProductId());
				$cart->setQuantity($cartGuest->getQuantity());
				
				$_SESSION["cartprodid"][$i] = $cart;
			}
			
		}
	}
	
	public function getGuestProducts(){

		$cartSelect = new cartSelect();

		if(!empty($_SESSION['cartprodid']))
		{
		unset($_SESSION['cartprod']);
		$cartSelect->cartInsert($_SESSION['cartprodid']);

		for($i = 0; $i < sizeof($_SESSION['cartprod']); $i++)
		{
			for($k = 0; $k < sizeof($_SESSION['cartprod']); $k++)
			{	if($i != $k){
					if ($_SESSION['cartprod'][$i]->getProductID() == $_SESSION['cartprod'][$k]->getProductID())
					{
						$_SESSION['cartprod'][$i+1]->setQuantity($_SESSION['cartprod'][$i+1]->getQuantity()+1);					
						array_splice($_SESSION['cartprod'],$k,$k+1);
						array_splice($_SESSION['cartprodid'],$k/2);
						
						$k--;
					}
				}
				$k++;
			}	
			$i++;
		}
		}
	}
	
	
}
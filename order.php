<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class OrderCheckOut{
	
	public function insertOrder($val,$val1){
		$cartselect = new cartSelect();
		$order = $val1;
		$cartID = $val;
		$carts = $cartselect->getCartProducts($cartID);
		$orderID = "";
		
		
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
		
		
		$sql = "insert into orders (CustomerID, TotalAmount, OrderDate) values (".$order->getCustomerID().",".$order->getTotalAmount().", NOW());";
	
		if (mysql_query($sql) === true){
			$orderID = mysql_insert_id();
		}else
			echo "ERROR insert1";
		
		foreach($carts as $cart){
			
			
			$sql = "SELECT products.price from products where products.productid = ".$cart->getProductID();
			$result = mysql_query($sql);
			if($row = mysql_fetch_array($result)){}
				else
					echo "ERROR insert2";
			
			$sql = "insert into orderdetails (orderID, productID, quantity, price) values (".$orderID.",".$cart->getProductID().",".$cart->getQuantity().",".$row['price'].");";
			if (mysql_query($sql) === true){
			}else
				echo "ERROR insert2";
		}
			
		foreach($carts as $cart){
			$sql = "update products set quantity = quantity-".$cart->getQuantity()." where  productID = ".$cart->getProductID();
			if (mysql_query($sql) === true){			
			}else
				echo "ERROR update";
		}
		
		$sql = "delete from cartdetails WHERE cartid = ".$cartID;
		if (mysql_query($sql) === TRUE) {
		}
		mysql_close($DBConnect);
		return $orderID;
	}
	
	public function getOrdersdetails($val){
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$product = array();
		
		$where = $val;

		
		
		$sql = "SELECT od.OrderID, od.ProductID, od.Quantity, od.Price, DATE_FORMAT(os.OrderDate,'%d %b %Y %h:%i %p') as OrderDate, p.ProductCat, p.ProductName FROM orders os join orderdetails od on os.OrderID = od.OrderID join products p on p.ProductID = od.ProductID Where os.customerID = ".$where." ORDER BY od.OrderID;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error());
			}
			
			while ($row = mysql_fetch_array($result))
			{
				$games = new Games();
				$order = new Order();
				
				$order->setOrderID($row['OrderID']);
				$order->setOrderDate($row['OrderDate']);
				$games->setProductID($row['ProductID']);
				$games->setProductName($row['ProductName']);				
				$games->setProductCat($row['ProductCat']);
				$games->setQuantity($row['Quantity']);
				$games->setPrice($row['Price']);

				array_push($product,$order);
				array_push($product,$games);
			}
			mysql_close($DBConnect);
			return $product;
	}
	
	public function checkQuantity($val){
		
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		
		$cartID = $val;
		
		$errors = array();
		
		$sql = "SELECT products.ProductID,products.ProductName, products.Quantity as PQuantity, cartdetails.Quantity as CQuantity FROM cartdetails join products on products.ProductID = cartdetails.ProductID  where cartdetails.cartID = ".$cartID;
		$result = mysql_query($sql);
		if($result === FALSE) { 
			die(mysql_error());
		}
		while($row = mysql_fetch_array($result)) {
			$product = new Accessories();
			$cart = new Cart();
			
			$product->setProductID($row['ProductID']);
			$product->setProductName($row['ProductName']);
			$product->setQuantity($row['PQuantity']);
			$cart->setQuantity($row['CQuantity']);
			
			
			if ($cart->getQuantity() > $product->getQuantity())
			array_push($errors, "<strong>".$product->getProductName()."</strong> only has <strong>".$product->getQuantity()."</strong> available stock at hand please lower or remove item from list to continue with order.");
			
		}
		
		mysql_close($DBConnect);
		
		return $errors;
	}
	
}
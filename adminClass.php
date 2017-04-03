<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class Admin{
	

	public function getAllProducts($val){
		
		$product = array();
		$ProductCat = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);

			if ($ProductCat == "Accessories")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, products.Status, Accessories.PlatForm FROM products join Accessories on products.ProductID = Accessories.ProductID;";
			else if ($ProductCat == "Games")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, products.Status, games.PlatForm, games.Genre FROM products join games on products.ProductID = games.ProductID;";

			$result = mysql_query($sql);
			
			if($result === FALSE) { 
				die(mysql_error()); 
			}

			
			while($row = mysql_fetch_array($result)) {
				$accessories = new Accessories();
				$games = new Games();

				if ($ProductCat == "Accessories"){
					$accessories->setProductID($row['ProductID']);
					$accessories->setProductCat($row['ProductCat']);
					$accessories->setProductName($row['ProductName']);
					$accessories->setProductDestription($row['ProductDestription']);
					$accessories->setPrice($row['Price']);
					$accessories->setQuantity($row['Quantity']);
					$accessories->setStatus($row['Status']);
					$accessories->setPictureURL($row['PictureURL']);
					$accessories->setPlatform($row['PlatForm']);
					array_push($product,$accessories);
				}
				
				else if ($ProductCat == "Games"){
					$games->setProductID($row['ProductID']);
					$games->setProductCat($row['ProductCat']);
					$games->setProductName($row['ProductName']);
					$games->setProductDestription($row['ProductDestription']);
					$games->setPrice($row['Price']);
					$games->setQuantity($row['Quantity']);
					$games->setPictureURL($row['PictureURL']);
					$games->setStatus($row['Status']);
					$games->setPlatform($row['PlatForm']);
					$games->setGendre($row['Genre']);
					array_push($product,$games);
				}
			}
			
			mysql_close($DBConnect);
			
			return $product;
		
	}
	
	public function deleteProducts($val){
		
		$productID = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
	
		$sql = "update products set status = 1 where  productID = ".$productID;
			if (mysql_query($sql) === true){			
			}else
				echo "ERROR update";
	
		mysql_close($DBConnect);
	}
	
	public function insertProducts(){
		$ProductID;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		
		//http://www.rcramer.com/tech/php/file_upload.shtml
            //if there was an error uploading the file
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";

        }
        else {


                 //if file already exists
             if (file_exists("upload/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
             }
             else {
                    //Store file in directory "upload" with the name of "uploaded_file.txt"
            $newname = "newProducts.csv";
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $newname);
            }
        }
		$row = 1;
		if (($handle = fopen("upload/" . $newname, "r")) !== FALSE)
		{

			while (($data = fgetcsv($handle, 4000, ",")) !== FALSE)
			{
		if ($row == 1 || empty($data[0])){
					$row++;
					continue;
				}
				
				$sql = 'INSERT INTO products (ProductCat, ProductName, ProductDestription, Price, Quantity, PictureURL, Status) 
						VALUES ("'.$data[0].'","'.$data[1].'","'.$data[2].'",'.$data[3].','.$data[4].',"'.$data[5].'",0)'; 
				//"themes/images/products/'.$data[5].'.jpg"
				if (mysql_query($sql) === TRUE) {
					$ProductID = mysql_insert_id();
				}else{
					echo $sql."</br>";
					die(mysql_error());
				}
				
				if ($data[0] == "GAMES")
					$sql = 'INSERT INTO games (Productid, Platform, Genre) 
					VALUES ('.$ProductID.',"'.$data[6].'","'.$data[7].'")';
				else if ($data[0] == "ACCESSORIES")
					$sql = 'INSERT INTO accessories (Productid, Platform) 
					VALUES ('.$ProductID.',"'.$data[6].'")';
					

	
				if (mysql_query($sql) === TRUE) {
					
				}else{
					echo $sql."</br>";
					die(mysql_error());
				}
				
				$row++;

			}
		fclose($handle);
		}
		mysql_close($DBConnect);
	}
	
	public function getRecord($val)
	{
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$where = $val;
		if (file_exists("upload/updateProduct.csv"))
			unlink('upload/updateProduct.csv');
		
		$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL FROM products where products.ProductID = ".$where." AND products.Status = 0;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error()); // TODO: better error handling
			}

			$ProductCat = mysql_fetch_array($result);

			if ($ProductCat['ProductCat'] == "ACCESSORIES")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, products.Status, Accessories.PlatForm FROM products join Accessories on products.ProductID = Accessories.ProductID where products.ProductID = ".$where." AND products.Status = 0;";
			else if ($ProductCat['ProductCat'] == "GAMES")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, products.Status, games.PlatForm, games.Genre FROM products join games on products.ProductID = games.ProductID where products.ProductID = ".$where." AND products.Status = 0;";

		$result = mysql_query($sql);

		$fp = fopen('upload/updateProduct.csv', 'w');
		
		if ($ProductCat['ProductCat'] == "ACCESSORIES")
			$colname = array(mysql_field_name($result,0),mysql_field_name($result,1),mysql_field_name($result,2),mysql_field_name($result,3),mysql_field_name($result,4),mysql_field_name($result,5),mysql_field_name($result,6),mysql_field_name($result,7),mysql_field_name($result,8));
		else if ($ProductCat['ProductCat'] == "GAMES")
			$colname = array(mysql_field_name($result,0),mysql_field_name($result,1),mysql_field_name($result,2),mysql_field_name($result,3),mysql_field_name($result,4),mysql_field_name($result,5),mysql_field_name($result,6),mysql_field_name($result,7),mysql_field_name($result,8),mysql_field_name($result,9));
		
			fputcsv($fp, $colname);
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			 fputcsv($fp, $row);
		}

		fclose($fp);
		mysql_close($DBConnect);
	}
	
	public function getOrdersdetails($val){
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$product = array();
		
		if ($val != "")
			$where = "where od.OrderID = ".$val;
		else
			$where = "";
		
		
		$sql = "SELECT od.OrderID, od.ProductID, od.Quantity, od.Price, DATE_FORMAT(os.OrderDate,'%d %b %Y %h:%i %p') as OrderDate, p.ProductCat, p.ProductName FROM orders os join orderdetails od on os.OrderID = od.OrderID join products p on p.ProductID = od.ProductID ".$where." ORDER BY od.OrderID;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error()); // TODO: better error handling
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
	
	public function getHighestSoldProduct(){
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$product = array();
		$sql = "SELECT o.ProductID, SUM(o.Quantity) as Quantity, p.ProductName FROM orderdetails o join products p on o.ProductID = p.ProductID GROUP BY o.ProductID ORDER BY SUM(o.Quantity) DESC;";
		$result = mysql_query($sql);
		if($result === FALSE) { 
				die(mysql_error()); // TODO: better error handling
		}
			
		while ($row = mysql_fetch_array($result))
		{
			$games = new Games();
				
			$games->setProductName($row['ProductName']);				
			$games->setProductID($row['ProductID']);
			$games->setQuantity($row['Quantity']);

			array_push($product,$games);
		}
		mysql_close($DBConnect);
			return $product;
	}
	
	public function getHighestGrossMonth(){
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$product = array();
		$sql = "SELECT MONTH(o.OrderDate) as OrderDate, SUM(od.Price*od.Quantity)as Price, SUM(od.Quantity) as Quantity FROM orders o JOIN orderdetails od on o.OrderID = od.OrderID GROUP BY MONTH(o.OrderDate) ORDER BY SUM(od.Price) DESC;";
		$result = mysql_query($sql);
		if($result === FALSE) { 
				die(mysql_error()); // TODO: better error handling
		}
			
			while ($row = mysql_fetch_array($result))
			{
				$games = new Games();
				$order = new Order();
				
				$order->setOrderDate($row['OrderDate']);			
				$games->setQuantity($row['Quantity']);
				$games->setPrice($row['Price']);

				array_push($product,$order);
				array_push($product,$games);
			}
			mysql_close($DBConnect);
			return $product;
	}
	
	public function getProductsRestock(){
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
		$product = array();
		$sql = "SELECT p.ProductID, p.ProductName, p.Quantity FROM products p WHERE p.Quantity < 25;";
		$result = mysql_query($sql);
		if($result === FALSE) { 
				die(mysql_error()); 
		}
			
		while ($row = mysql_fetch_array($result))
		{
			$games = new Games();
				
			$games->setProductID($row['ProductID']);
			$games->setProductName($row['ProductName']);				
			$games->setQuantity($row['Quantity']);

				array_push($product,$games);
		}
		mysql_close($DBConnect);
			return $product;
	}
	
	public function updateProducts(){
		$ProductID;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		@mysql_select_db("shoppingcart", $DBConnect);
            
       
		$row = 1;
		if (($handle = fopen("upload/updateProduct.csv", "r")) !== FALSE)
		{

			while (($data = fgetcsv($handle, 4000, ",")) !== FALSE)
			{
				if ($row == 1 || empty($data[0])){
					$row++;
					continue;
				}
				
				$sql = 'UPDATE products SET ProductCat="'.$data[1].'",ProductName="'.$data[2].'",ProductDestription="'.$data[3].'",Price='.$data[4].',Quantity='.$data[5].',PictureURL="'.$data[6].'",Status='.$data[7].' WHERE ProductID = '.$data[0];
				
				if (mysql_query($sql) === TRUE) {
					$ProductID = mysql_insert_id();
					
				}else{
					echo $sql."</br>";
					die(mysql_error());
				}
				
				if ($data[1] == "GAMES")
					$sql = 'UPDATE games SET Platform = "'.$data[8].'", Genre = "'.$data[9].'" WHERE ProductID = '.$data[0];
				else if ($data[1] == "ACCESSORIES")
					$sql = 'UPDATE accessories SET Platform = "'.$data[8].'" WHERE ProductID = '.$data[0];
	
				if (mysql_query($sql) === TRUE) {
					
				}else{
					echo $sql."</br>";
					die(mysql_error());
				}
				
				$row++;

			}
		fclose($handle);
		}
		mysql_close($DBConnect);
	}
}
<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php

class ProductSelect
{

    public function getProductsgames($val)
    {
		
		$game = array();
		$where = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
		if ($where != 'All')
			$where = "= '".$where."'";
		else
			$where = "!= 'null'";
		
        	$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, games.PlatForm, games.Genre FROM products join games on products.ProductID = games.ProductID where games.Genre ".$where." AND products.Status = 0;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error());
			}
			while($row = mysql_fetch_array($result)) {
				$games = new Games();
				$games->setProductID($row['ProductID']);
				$games->setProductCat($row['ProductCat']);
				$games->setProductName($row['ProductName']);
				$games->setProductDestription($row['ProductDestription']);
				$games->setPrice($row['Price']);
				$games->setQuantity($row['Quantity']);
				$games->setPictureURL($row['PictureURL']);
				$games->setPlatform($row['PlatForm']);
				$games->setGendre($row['Genre']);
				
				
				array_push($game,$games);
			}
			
			mysql_close($DBConnect);
			
			return $game;
			
    }
	
	 public function getProductsAccessories($val)
    {
		
		$accessory = array();
		$where = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
		if ($where != 'All')
			$where = "= '".$where."'";
		else
			$where = "!= 'null'";
		
        	$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, Accessories.PlatForm FROM products join Accessories on products.ProductID = Accessories.ProductID where Accessories.PlatForm ".$where." AND products.Status = 0;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error()); // TODO: better error handling
			}
			while($row = mysql_fetch_array($result)) {
				$accessories = new Accessories();
				$accessories->setProductID($row['ProductID']);
				$accessories->setProductCat($row['ProductCat']);
				$accessories->setProductName($row['ProductName']);
				$accessories->setProductDestription($row['ProductDestription']);
				$accessories->setPrice($row['Price']);
				$accessories->setQuantity($row['Quantity']);
				$accessories->setPictureURL($row['PictureURL']);
				$accessories->setPlatform($row['PlatForm']);
				
				
				array_push($accessory,$accessories);
			}
			
			mysql_close($DBConnect);
			
			return $accessory;
			
    }
	
	public function getProductsAll($val){
		
		$product;
		$where = $val;
		$DBConnect = @mysql_connect("localhost","root","", "shoppingcart");
		$Result = @mysql_select_db("shoppingcart", $DBConnect);
		
        	$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL FROM products where products.ProductID = ".$where." AND products.Status = 0;";
			$result = mysql_query($sql);
			if($result === FALSE) { 
				die(mysql_error());
			}

			$ProductCat = mysql_fetch_array($result);

			if ($ProductCat['ProductCat'] == "ACCESSORIES")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, Accessories.PlatForm FROM products join Accessories on products.ProductID = Accessories.ProductID where products.ProductID = ".$where." AND products.Status = 0;";
			else if ($ProductCat['ProductCat'] == "GAMES")
				$sql = "SELECT products.ProductID, products.ProductCat, products.ProductName, products.ProductDestription, products.Price, products.Quantity, products.PictureURL, games.PlatForm, games.Genre FROM products join games on products.ProductID = games.ProductID where products.ProductID = ".$where." AND products.Status = 0;";

			$result = mysql_query($sql);
			
			while($row = mysql_fetch_array($result)) {
				$accessories = new Accessories();
				$games = new Games();

				if ($ProductCat['ProductCat'] == "ACCESSORIES"){
					$accessories->setProductID($row['ProductID']);
					$accessories->setProductCat($row['ProductCat']);
					$accessories->setProductName($row['ProductName']);
					$accessories->setProductDestription($row['ProductDestription']);
					$accessories->setPrice($row['Price']);
					$accessories->setQuantity($row['Quantity']);
					$accessories->setPictureURL($row['PictureURL']);
					$accessories->setPlatform($row['PlatForm']);
					$product = $accessories;
				}
				
				else if ($ProductCat['ProductCat'] == "GAMES"){
					$games->setProductID($row['ProductID']);
					$games->setProductCat($row['ProductCat']);
					$games->setProductName($row['ProductName']);
					$games->setProductDestription($row['ProductDestription']);
					$games->setPrice($row['Price']);
					$games->setQuantity($row['Quantity']);
					$games->setPictureURL($row['PictureURL']);
					$games->setPlatform($row['PlatForm']);
					$games->setGendre($row['Genre']);
					$product = $games;
				}
			}
			
			mysql_close($DBConnect);
			
			return $product;
		
	}
	
	public function resize($val,$new_width, $new_height){
		$image = $val;
		$image_size = getimagesize($image);
		$rest = substr($val, -4);
		
		$image_width = $image_size[0];
		$image_height = $image_size[1];
		
		
		$new_image = imagecreatetruecolor($new_width,$new_height);
		
		if($rest == '.jpg')
			$old_image = imagecreatefromjpeg($image);
		if($rest == '.png')
			$old_image = imagecreatefrompng($image);
		
		imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);

		if($rest == '.jpg'){
			imagejpeg($new_image, $image.'.thumb.jpg');
			return $image.'.thumb.jpg';
		}

		if($rest == '.png'){
			imagepng($new_image, $image.'.thumb.png');
			return $image.'.thumb.png';
		}
	}
	
}
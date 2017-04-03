<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php 

require('ProductSelect.php');
require('ProductClass.php');
require('cartSelect.php');
require('cart.php');
require('orderClass.php');
require('order.php');
require('adminClass.php');
session_start();
ob_start();

if($_SESSION["USERNAME"] == "ADMIN"){
$games = new Games();
$accessories = new accessories();
$admin = new Admin();
$productSelect = new ProductSelect();

$err = "";

if(!empty($_POST["ddCat"]))
{
	if ($_POST["ddCat"] != "none")
	{
		if ($_POST["ddCat"] == "Accessories")
			$accessories =  $admin->getAllProducts($_POST["ddCat"]);
		else
			$games = $admin->getAllProducts($_POST["ddCat"]);
	}
}
if(isset($_POST["delete"]))
{
	if(!empty($_POST["ProductID"]))
	$admin->deleteProducts($_POST["ProductID"]);


}
if (isset($_POST["submitInsert"])){

	 if (isset($_FILES["file"])) {
		 $admin->insertProducts();
	 } else {
             $err = "No file selected <br />";
     }
}

if(isset($_POST["displayOrder"])) {
	$ordersdetails = $admin->getOrdersdetails($_POST["OrderID"]); 
}

if (isset($_POST["getRecord"])){
	
	if (!empty($_POST["ProductID"]))
	$admin->getRecord($_POST["ProductID"]); 
}

if (isset($_POST["update"])){
	$admin->updateProducts();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  </head>
  <?php 
	include 'styles.php';
?>	
<body>
<div id="header">
<div class="container">
<?php 

	if (empty($_SESSION["USERNAME"]))
	$_SESSION["USERNAME"] = "Guest";

?>
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php echo $_SESSION["USERNAME"]; ?></strong></div>
</div>
<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="#"><img src="themes/images/logo.png" alt="Bootsshop"/></a>
    <ul id="topMenu" class="nav pull-right">
	 <?php
	 if ($_SESSION["USERNAME"] !== 'Guest')
	 {
	 ?>
	 <li class="">
	 <a href="logout.php" role="button" style="padding-right:0"><span formmethod="post" class="btn btn-large btn-success">Log Out</span></a>
	 </li>
	<?php
	 }
	else{
	?>

	<?php 
			if (basename($_SERVER['PHP_SELF']) != 'login.php'){
		?> 
		 
			<li class="">
			<a href="login.php" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
		</li>
	<?php
	}
	}
	?>
    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
<div id="mainBody">
	<div class="container">
		<div class="row">
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
			<ul id="sideManu" class="nav nav-tabs nav-stacked">
			<li class="subMenu"><a>Product</a>
				<ul style="display:none">
				<li><a href="admin.php?Page=Add"><i class="icon-chevron-right" name="submitlog"></i>Add</a></li>
					<li><a href="admin.php?Page=Delete"><i class="icon-chevron-right" name="submitlog"></i>Delete</a></li>												
					<li><a href="admin.php?Page=Update"><i class="icon-chevron-right" name="submitlog"></i>Update</a></li>
					<li><a href="admin.php?Page=Display"><i class="icon-chevron-right" name="submitlog"></i>Display</a></li>
				</ul>
			</li>
			<li class="subMenu"><a>Reports</a>
				<ul style="display:none">
				<li><a href="admin.php?Page=Order"><i class="icon-chevron-right" name="MMORPG"></i>Sales Report On Order</a></li>
				<li><a href="admin.php?Page=Sold"><i class="icon-chevron-right" name="Adventure"></i>List Of Highest Sold Products</a></li>													
				<li><a href="admin.php?Page=Gross"><i class="icon-chevron-right" name="Fighting"></i>List Of Highest Gross Month</a></li>																							
				<li><a href="admin.php?Page=Re-stock"><i class="icon-chevron-right" name="Racing"></i>List Of Product needing Re-stock</a></li>																														
			</ul>
			</li>
		</ul>
		<br/>
			
	</div>
<!-- Sidebar end=============================================== -->
<?php if(empty($_GET['Page'])){ ?>
			<div class="span9">		
				<div class="well well-small">
				<div class="alert alert-info fade in">
					<strong>WELCOME ADMIN</strong>
				</div>
				</div>
			</div>
			
<?php } else if(!empty($_GET['Page'] == "Add") ){ ?>

	<div class="span9">
				<div class="well well-small">
				<table class="table table-bordered">
			 <tr><th>Add Products </th></tr>
			 <tr> 
			 <td>
				 <div class="control-group">
					<label class="control-label" for="inputPost">Product CSV File</label>
					<div class="controls">
					  <input type="file" name="file" id="file">
					</div>
				  </div>
				  <div class="control-group">
					<div class="controls">
					  <button type="submit" name="submitInsert" class="btn">Submit </button>
					  <?php echo $err; ?>
					</div>
				  </div>			  
			  </td>
			  </tr>
            </table>		
				</div>
	</div>

<?php } else if(!empty($_GET['Page'] == "Delete") ){ ?>
			<div class="span9">	
				<div class="well well-small">
				<table class="table table-bordered">
			 <tr><th>Delete Product </th></tr>
			 <tr> 
			 <td>


				  <div class="control-group">
					<label class="control-label" for="inputPost">Product ID</label>
					<div class="controls">
					  <input type="text" id="inputPost" name="ProductID" placeholder="Product ID">
					</div>
				  </div>

				  <div class="control-group">
					<div class="controls">
					  <button type="submit" name="delete" class="btn" >Submit</button>
					</div>
				  </div>
		  
			  </td>
			  </tr>
            </table>		
				</div>
	</div>	
<?php } else if(!empty($_GET['Page'] == "Update") ){ ?>
			<div class="span9">	
				<div class="well well-small">
				<table class="table table-bordered">
			 <tr><th>Update Product </th></tr>
			 <tr> 
			 <td>
			 <div class="control-group">
					<label class="control-label" for="inputPost">Product ID</label>
					<div class="controls">
					  <input type="text" id="inputPost" name="ProductID" placeholder="Product ID">
					</div>
					<div class="controls">
					  <button type="submit" name="getRecord" class="btn" >Get Record</button>
					</div>
				  </div>

				  <div class="control-group">
					<div class="controls">
					  <button type="submit" name="update" class="btn" >Update</button>
					</div>
				  </div>
				   
			  </td>
			  </tr>
            </table>		
				</div>
	</div>	
<?php } else if(!empty($_GET['Page'] == "Display") ){ ?>
			<div class="span9">		
				<div class="well well-small">
				<table class="table table-bordered">
				 <div class="control-group">
					<label class="control-label" for="inputPost">Product Catergory </label>
					<div class="controls">
						<select name="ddCat" onchange="this.form.submit()">
						<option value="none">--Select Catergory--</option>
						  <option value="Accessories">Accessories</option>
						  <option value="Games">Games</option>
						</select>
					</div>
				  </div>
			 <thead>
                <tr>
                  <th>Product</th>
				  <th>Catergory</th>
                  <th>Product Name</th>
                  <th>Price</th>
				  <th>Quantity</th>
				  <th>Satus</th>
				</tr>
              </thead>
              <tbody>
				
				<?php if (!empty($_POST["ddCat"])){
				if ($_POST["ddCat"] == "Accessories"){ foreach ($accessories as $accessory){?>
				<tr> 
					<td><img width="60" src="<?php echo $accessory->getPictureURL() ?>" alt=""/>
					</td>
				
				
					<td><?php echo $accessory->getProductID(); ?>			  
					</td>
					
					<td><?php echo $accessory->getProductCat(); ?>		  
					</td>
					
					<td><?php echo $accessory->getProductName(); ?>			  
					</td>
					
					<td><?php echo "R".$accessory->getPrice(); ?>			  
					</td>
					
					<td><?php echo $accessory->getQuantity(); ?>			  
					</td>
					
					<td><?php if ($accessory->getStatus() == 0) 
							echo "Active";
						else
							echo "Inactive"; ?>		
					</td>				
				</tr>
				<?php }} if ($_POST["ddCat"] == "Games"){ foreach ($games as $game){?>
				<tr> 
					<td><img width="60" src="<?php echo $game->getPictureURL() ?>" alt=""/>
					</td>
					
					<td><?php echo $game->getProductID(); ?>			  
					</td>
					
					<td><?php echo $game->getProductCat(); ?>		  
					</td>
					
					<td><?php echo $game->getProductName(); ?>			  
					</td>
					
					<td><?php echo "R".$game->getPrice(); ?>			  
					</td>
					
					<td><?php echo $game->getQuantity(); ?>			  
					</td>
					
					<td><?php if ($game->getStatus() == 0) 
							echo "Active";
						else
							echo "Inactive";
					
					?>			  
					</td>				
				</tr>
				<?php }}} ?>
				
				</tbody>
            </table>		
				</div>
			</div>		
<?php } else if(!empty($_GET['Page'] == "Order") ){ ?>
			<div class="span9">		
				<div class="well well-small">
				<table class="table table-bordered">
				 <div class="control-group">
					<label class="control-label" for="inputPost">Sales Report On Order </label>
				  </div>
				<div class="control-group">
					<label class="control-label" for="inputPost">Order ID</label>
					<div class="controls">
					  <input type="text" id="inputPost" name="OrderID" placeholder="Order ID">
					</div>
					<div class="controls">
					  <button type="submit" name="displayOrder" class="btn" >Search</button>
					</div>
				  </div>
			 <thead>
                <tr>
                  <th>Order ID</th>
				  <th>Order Date</th>
				  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
				  <th>Price</th>
				  <th>Sub total</th>
				</tr>
              </thead>
              <tbody>
				
				<?php 
				$total = 0;
				$grandTotal = 0;
				if (!empty($ordersdetails))
				{
				for ($count = 0; $count < sizeof($ordersdetails); $count++){?>
				<tr> 

					<td><?php echo $ordersdetails[$count]->getOrderID(); ?>		  
					</td>
									
					<td><?php echo $ordersdetails[$count]->getOrderDate(); ?>	
					</td>	
					
					<td><?php $count++; echo $ordersdetails[$count]->getProductID(); ?>		  
					</td>
					
					<td><?php echo $ordersdetails[$count]->getProductName(); ?>	  
					</td>
					
					<td><?php echo $ordersdetails[$count]->getQuantity(); ?>		  
					</td>
					
					<td><?php echo "R ".$ordersdetails[$count]->getPrice(); ?>		  
					</td>			
				
					<td><?php $total +=	$subtotal = $ordersdetails[$count]->getQuantity()*$ordersdetails[$count]->getPrice(); 
								echo "R ".number_format($subtotal, 2, '.', '');?>	
					</td>
				</tr>
				<?php
				
if(!isset($ordersdetails[$count+1]) || $ordersdetails[$count-1]->getOrderID() != $ordersdetails[$count+1]->getOrderID()){?>
					<tr>
					  <td colspan="6" style="text-align:right"><strong>TOTAL: </strong></td>
					  <td class="label label-important" style="display:block"> <strong> <?php echo "R ".number_format($total,2,".",""); 
					  $grandTotal = $grandTotal+$total;
					  $total = 0;?> </strong></td>
					</tr>

				<?php }} }?>
				<tr>
					  <td colspan="6" style="text-align:right"><strong>GRAND TOTAL: </strong></td>
					  <td class="label label-important" style="display:block"> <strong> <?php echo "R ".number_format($grandTotal,2,".",""); 
					  $grandTotal = 0;?> </strong></td>
					</tr>
				
				</tbody>
            </table>		
				</div>
			</div>		
<?php } else if(!empty($_GET['Page'] == "Sold") ){ ?>
			<div class="span9">		
				<div class="well well-small">
					<table class="table table-bordered">
				 <div class="control-group">
					<label class="control-label" for="inputPost">List Of Highest Sold Products </label>
				  </div>
			 <thead>
                <tr>
				  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity Sold</th>
				</tr>
              </thead>
              <tbody>
			  <?php $highestSold = $admin->getHighestSoldProduct(); 
				for ($count = 0; $count < sizeof($highestSold); $count++){?>
			  <tr>
					<td><?php echo $highestSold[$count]->getProductID(); ?></td>
					<td><?php echo $highestSold[$count]->getProductName(); ?></td>
					<td><?php echo $highestSold[$count]->getQuantity(); ?></td>

			  </tr>
				<?php } ?>
			  </tbody>
            </table>
				</div>
			</div>		
<?php } else if(!empty($_GET['Page'] == "Gross") ){ ?>
			<div class="span9">		
				<div class="well well-small">
					<table class="table table-bordered">
				 <div class="control-group">
					<label class="control-label" for="inputPost">List Of Highest Gross Month </label>
				  </div>
			 <thead>
                <tr>
                  <th>Month</th>
				  <th>Quantity Of items Sold</th>
				  <th>Total Gross</th>
				</tr>
              </thead>
              <tbody>
				<?php $highestGross = $admin->getHighestGrossMonth(); 
				for ($count = 0; $count < sizeof($highestGross); $count++){?>
			  <tr>
					<td><?php echo $highestGross[$count]->getOrderDate(); ?></td>
					<td><?php $count++; echo $highestGross[$count]->getQuantity(); ?></td>
					<td><?php echo "R ".number_format($highestGross[$count]->getPrice(),2,".",""); ?></td>

			  </tr>
				<?php } ?>
			  </tbody>
            </table>
				</div>
			</div>		
<?php } else if(!empty($_GET['Page'] == "Re-stock") ){ ?>
			<div class="span9">		
				<div class="well well-small">
					<table class="table table-bordered">
				 <div class="control-group">
					<label class="control-label" for="inputPost">List Of Product needing Re-stock </label>
				  </div>
			 <thead>
                <tr>
 				  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Quantity Left</th>
				</tr>
              </thead>
              <tbody>
				<?php $productsRestock = $admin->getProductsRestock(); 
				for ($count = 0; $count < sizeof($productsRestock); $count++){?>
			  <tr>
					<td><?php echo $productsRestock[$count]->getProductID(); ?></td>
					<td><?php echo $productsRestock[$count]->getProductName(); ?></td>
					<td><?php echo $productsRestock[$count]->getQuantity(); ?></td>

			  </tr>
				<?php } ?>
			  </tbody>
            </table>
				</div>
			</div>		
<?php } ?>
		</div>
	</div>
</form>
<!-- Footer ================================================================== -->
<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">

		 </div>
	</div><!-- Container End -->
	</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php
include 'script.php';
?>
</form>
</body>
</html>
<?php } ?>
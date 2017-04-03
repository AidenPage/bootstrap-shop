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
session_start();
$productSelect = new ProductSelect();
if (!empty($_GET["id"])){
	
	$where = $_GET["id"];
	$product = $productSelect->getProductsAll($where);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<?php 
	include 'styles.php';
?>	
  </head>
<body>
<div id="header">
<div class="container">
<?php
	include 'topnavbar.php';
?>
<!-- Navbar ================================================== -->
<?php
	include 'navbar.php';
?>
</div>
</div>
<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<?php
include 'sidebar.php';
?>
<!-- Sidebar end=============================================== -->
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
    <li><a href="products.php">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
			<div id="gallery" class="span3">
            <a href="<?php echo $product->getPictureURL(); ?>" title="<?php echo $product->getProductName(); ?>">
				<img src="<?php echo $productSelect->resize($product->getPictureURL(),260,336);?>" style="width:100%" alt="<?php echo $product->getProductName(); ?>"/>
            </a>
			</div>
			<div class="span6">
				<h3><?php echo $product->getProductName()." (".$product->getPlatform().")"; ?></h3>
				<small><?php echo $product->getProductID(); ?></small>
				<hr class="soft"/>
				<form class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span><?php echo "R".$product->getPrice(); ?></span></label>
					<div class="controls">
					<!--input type="number" class="span1" placeholder="Qty."/-->
					  <a href="addcart.php?id=<?php echo $product->GetProductID(); ?>" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></a>
					</div>
				  </div>
				</form>
				
				<hr class="soft"/>
				<h4><?php echo $product->getQuantity(); ?> items in stock</h4>
				<form class="form-horizontal qtyFrm pull-right">
				</form>
				<hr class="soft clr"/>
				<h4>Product Information</h4>
				<p>
				<?php echo $product->getProductDestription(); ?>
				</p>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
		
		 </div>
		</div>
	  </div>

	</div>
</div>
</div> </div>
</div>
<!-- MainBody End ============================= -->
<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php
include 'script.php';
?>
</body>
</html>
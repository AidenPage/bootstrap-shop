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
<?php
include 'header.php';
?>
<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
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
		<li class="active">Products</li>
    </ul>
	<?php
$product = false;
if(empty($_GET["Genre"]) && empty($_GET["Platform"]))
{
	$_GET["Genre"] = "All";
}

if(empty($_GET["Start"]) && empty($_GET["End"]))
{
	$_GET["Start"] = 0;
	$_GET["End"] =  9;
}


if (!empty($_GET["Genre"])){
	
	$where = $_GET["Genre"];
	$product = $productSelect->getProductsgames($where);
}
if (!empty($_GET["Platform"])){
	$where = $_GET["Platform"];
	$product = $productSelect->getProductsAccessories($where);
}

?>
	
	<h3> <?php if (count($product) > 0 )echo $product[0]->getProductCat()." / ".$where; ?> <small class="pull-right"> <?php echo $count = count($product); ?> products are available </small></h3>	
	<hr class="soft"/>

<br class="clr"/>
<!--Content-->
<div class="tab-content">

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
		
		<?php 
		
		$num = 0;
	if (!empty($_GET["Genre"]) || !empty($_GET["Platform"]))
	foreach ($product as $products) {
		
		if ($num >= $_GET["Start"] && $num <  $_GET["End"]){
		?>
			<li class="span3">
			  <div class="thumbnail">
				<a href="product_details.php?id=<?php echo $products->GetProductID(); ?>"><img src="<?php echo $productSelect->resize($products->getPictureURL(),260,336); ?>" alt=""/></a>
				<div class="caption">
				  <h5><?php if(strlen($products->getProductName()) < 28)echo $products->getProductName(); else  echo substr($products->getProductName(), 0, 28)."..."; ?></h5>
				  <p> 
					<?php echo $products->GetProductID(); ?>
				  </p>
				   <h4 style="text-align:center"><a class="btn" href="product_details.php?id=<?php echo $products->GetProductID(); ?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="addcart.php?id=<?php  echo $products->GetProductID(); ?>">Add to <i class="icon-shopping-cart"></i></a> <a onclick='return false;' class="btn btn-primary" href="#"><?php echo "R".$products->getPrice(); ?></a></h4>
				</div>
			  </div>
			</li>
		<?php }$num++; }?>
			
		  </ul>
	<hr class="soft"/>
	</div>
</div>

	<?php if (!empty($_GET["Genre"]))
			$search = "?Genre=".$_GET["Genre"];
		else if (!empty($_GET["Platform"])) 
			$search = "?Platform=".$_GET["Platform"];
		$start = 0;
		$end = 9;
		?>
	<div class="pagination">
			<ul>
			<li><a href="#" >&lsaquo;</a></li>
			<?php 
			$cnt = 1; 
			$page_row = 9;
			$last = ceil($count/$page_row);
			
			if ($last < 1)
				$last = 1;
			
			while ($cnt <= $last)
			{?>
		
			<li><a href="<?php echo $_SERVER['PHP_SELF'].$search."&Start=".$start."&End=".$end; ?>" ><?php echo $cnt;?></a></li>
			
			<?php $cnt++; $start+=9; $end+=9;} ?>
			<li><a href="#">&rsaquo;</a></li>
			</ul>
			
			
			
			</div>
			<br class="clr"/>
</div>
</div>
</div>
</div>
</form>
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
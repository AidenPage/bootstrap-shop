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

$orderCheckOut = new OrderCheckOut();

if($_SESSION["USERNAME"] != "Guest"){

	$ordersdetails = $orderCheckOut->getOrdersdetails($_SESSION["CustomerID"]); 


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
			<li class="active">Order History</li>
		</ul>	
			<div class="well well-small">
			<table class="table table-bordered">

		<div class="row">	  
		<div id="gallery" class="span3">
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
		
		
    </div>
	</div>
</div>
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

<?php
}
?>
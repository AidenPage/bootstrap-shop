<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php
require('accessclass.php');
require('userClass.php');
require('cartSelect.php');
require('cart.php');
require('productSelect.php');
require('ProductClass.php');
session_start();
ob_start();
$incorrectpass = false;

if(!empty($_SESSION["USERNAME"]) && $_SESSION["USERNAME"] == "Guest"){
	$cartselect = new cartSelect();
	$cartselect->getGuestProducts();
	if($_POST){
		for($num1 = 0; $num1 < sizeof($_SESSION['cartprod'])/2; $num1++){
			if(isset($_POST["delete_".$num1])){
				$cnt = 0;
				for ($count = 0; $count < sizeof($_SESSION['cartprod']); $count++) {
					
				if ($num1 == $cnt){
					unset($_SESSION['cartprod'][$count]);
					unset($_SESSION['cartprod'][$count+1]);
					$_SESSION['cartprod'] = array_values($_SESSION['cartprod']);

					unset($_SESSION['cartprodid'][$count/2]);
					$_SESSION['cartprodid'] = array_values($_SESSION['cartprodid']);

				}
				$cnt++;
				$count++;}
			}
		}
	}
	
	if(isset($_POST["refresh"])){
		$cnt = 0;
		for ($count = 0; $count < sizeof($_SESSION['cartprodid']); $count++) {			
		$_SESSION['cartprodid'][$count]->setQuantity($_POST["quantity"][$cnt]);
		
		$cnt++;}
	}
	
	if(isset($_POST["order"])){
		header('Location: login.php');
	}
}

if(isset($_POST["submitlog"]))
{	
	$user = new User();
	$access = new Access();
	
	$user->setEmailAddress($_POST['inputEmail1']);
	$user->setPassword(md5($_POST['inputPassword1']));
	$incorrectpass = $access->loggin($user,false);
}

if(!empty($_SESSION["USERNAME"]) && $_SESSION["USERNAME"] != "Guest")
{
if(isset($_POST["refresh"])){
	$cartselect = new cartSelect();
	$cnt = 0;
	for ($count = 0; $count < sizeof($_SESSION['cartprod']); $count++) {
		
	$cartselect->cartupdate($_SESSION['cartID'],$_SESSION['cartprod'][$count]->getProductID(),$_POST["quantity"][$cnt]);
	$cnt++;
	$count++;}
}
if($_POST){
	for($num1 = 0; $num1 < sizeof($_SESSION['cartprod'])/2; $num1++){
	if(isset($_POST["delete_".$num1])){
		$cartselect = new cartSelect();
		$cnt = 0;
		for ($count = 0; $count < sizeof($_SESSION['cartprod']); $count++) {
			
		if ($num1 == $cnt)
		$cartselect->cartdelete($_SESSION['cartID'],$_SESSION['cartprod'][$count]->getProductID());

		$cnt++;
		$count++;}
		
	}
}
}

if ($_SESSION["USERNAME"] != 'Guest')
{
	$cartselect = new cartSelect();

	if (!empty ($_SESSION['cartprodid'])){
		$cartselect->InsertToCartDB($_SESSION['cartprodid']);
		unset($_SESSION['cartprodid']);
	}
	if (!empty ($_SESSION['cartprod']))
		unset($_SESSION['cartprod']);
	$cart = $cartselect->getCartProducts($_SESSION['cartID']);
	$cartselect->cartInsert($cart);
}
	
	if(isset($_POST["order"])){
		$cartselect = new cartSelect();
		$cnt = 0;
		for ($count = 0; $count < sizeof($_SESSION['cartprod']); $count++) {
			
		$cartselect->cartupdate($_SESSION['cartID'],$_SESSION['cartprod'][$count]->getProductID(),$_POST["quantity"][$cnt]);
		$cnt++;
		$count++;}
		header('Location: checkout.php');
	}
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
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART [ <small><?php if(!empty($_SESSION['cartprod'])) echo sizeof($_SESSION['cartprod'])/2; else echo "0" ?> Item(s) </small>]<button type="submit" name="refresh" class="btn btn-large pull-right"><i class="icon-refresh"></i></button></h3>	
	<hr class="soft"/>
	 <?php
	 if ($_SESSION["USERNAME"] === 'Guest')
	 {
	 ?>
	<table class="table table-bordered">
		<tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" name="inputEmail1" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" name="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" name="submitlog" class="btn" formmethod="post">Sign in</button> OR <a href="register.php" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
						<?php 
							if ($incorrectpass == true)
							echo 'Invaild username/password';
						?>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</table>
	 <?php
	 }
	 ?>
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
				  <th>ID</th>
                  <th>Name</th>
                  <th>Quantity/Update</th>
				  <th>Unit Price</th>
				  <th>Sub Total</th>
				</tr>
              </thead>
              <tbody>
			  
			  <?php $counts = 0; $total = 0; if(!empty($_SESSION['cartprod'])) for ($count = 0; $count < sizeof($_SESSION['cartprod']); $count++) { ?>
                <tr>
                  <td> <img width="60" src="<?php echo $_SESSION['cartprod'][$count]->getPictureURL() ?>" alt=""/></td>
				  <td><?php echo $_SESSION['cartprod'][$count]->getProductID() ?></td>
                  <td><?php echo $_SESSION['cartprod'][$count]->getProductName() ?></td>
				  <td>
					<input type="hidden" name="hiddendelete[]" value="<?php echo $counts; ?>">
					<div class="input-append"><input class="span1" name="quantity[]" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text" value = "<?php echo $_SESSION['cartprod'][$count+1]->getQuantity() ?>">
					<button type="submit" name="delete_<?php echo $counts; ?>" class="btn btn-danger" type="button"><i class="icon-remove icon-white"></i></button></div>
				  </td>
                  <td><?php echo "R ".$_SESSION['cartprod'][$count]->getPrice() ?></td>
				  <td><?php 
				  $num = $_SESSION['cartprod'][$count]->getPrice()*$_SESSION['cartprod'][$count+1]->getQuantity();
				  echo "R ".number_format($num, 2, '.', '');
				 $total += ($_SESSION['cartprod'][$count]->getPrice()*$_SESSION['cartprod'][$count+1]->getQuantity());
				  ?></td>
                </tr>
			 <?php $count++; $counts++;} ?>
				
				 <tr>
                  <td colspan="5" style="text-align:right"><strong>TOTAL: </strong></td>
                  <td class="label label-important" style="display:block"> <strong> <?php $_SESSION["total"] = $total; echo "R ".number_format($total,2,".",""); ?> </strong></td>
                </tr>
				</tbody>
            </table>	
	<a href="products.php" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<button type="submit" name="order" class="btn btn-large pull-right" type="button">Checkout<i class="icon-arrow-right"></i></button>
</div>
</div></div>
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
<?php 
ob_end_flush();
?>
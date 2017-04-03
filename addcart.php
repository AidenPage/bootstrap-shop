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
session_start();
ob_start();
$cartSelect = new cartSelect();
$productSelect = new ProductSelect();

if(!empty($_GET["id"])){
$cartSelect->cartInsertid($_GET["id"],1);
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
				<div class="well well-small">
				<div class="alert alert-info fade in">
					<strong>Item has been added to cart</strong>
				</div>
				</div>
			</div>
		</div>
	</div>
</form>
<!-- Footer ================================================================== -->
<?php
include 'footer.php';
?>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<?php
include 'script.php';
?>
</form>
</body>
</html>

<?php
if(!empty($_GET["id"])){

header("Refresh: 1; URL={$_SERVER['HTTP_REFERER']}");
ob_end_flush();
}
?>
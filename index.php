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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gaming Mania</title>
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
		<div class="span9" style="padding-right:0" >
		<h3>The Gaming Mania Difference</h3>
			<h4> We don’t just sell games - we are game lovers.</h4>
			<h4 class=""> We are always excited about new trends and new developments and our passion for our business is one of the keys to our success. </h4>
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





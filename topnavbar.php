<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php 
	if (empty($_SESSION["USERNAME"])){
	$_SESSION["USERNAME"] = "Guest";
	$_SESSION["cartID"] = "Guest";
	}

?>
<div id="welcomeLine" class="row">
	<div class="span6">Welcome!<strong> <?php echo $_SESSION["USERNAME"]; ?></strong></div>
	<div class="span6">
	<div class="pull-right">
		<!--span class="btn btn-mini">$155.00</span-->
		<a href="product_summary.php"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> Itemes in your cart </span> </a> 
	</div>
	</div>
</div>
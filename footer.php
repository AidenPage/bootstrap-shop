<div  id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>ACCOUNT</h5> 
				<a href="<?php 	if(!empty($_SESSION["USERNAME"]) && $_SESSION["USERNAME"] == "Guest") 
									echo "login.php"; 
								else echo "orderHistory.php"; ?>">ORDER HISTORY</a>
			 </div>
			<div class="span3">
				<h5>INFORMATION</h5>
				<a href="contact.php">CONTACT</a>
					<?php 	if($_SESSION["USERNAME"] == "Guest") { ?>
				<a href="register.php">REGISTRATION</a> 
					<?php } ?>
			 </div>
		 </div>
	</div><!-- Container End -->
	</div>
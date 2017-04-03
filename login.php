<!--
group members : Aiden Page (211121614)
				Rick Roderiques (213066521)
				Connel Smith (213032600)
We certify that material is of our own original work. Except where referencecw, 
this project contains no material published elsewhere. No other person's work has been used without due acknowledgement.

-->
<?php
require('DatabaseConn.php');
require('accessclass.php');
require('userClass.php');
require('cartSelect.php');
require('cart.php');
require('productSelect.php');
require('ProductClass.php');
session_start();
if ($_SESSION["USERNAME"] == "Guest")
{
$incorrectpass = false;


if(isset($_POST["submitlog"]))
{	
	$user = new User();
	$access = new Access();
	
	$user->setEmailAddress($_POST['inputEmail1']);
	$user->setPassword(md5($_POST['inputPassword1']));
	
	$incorrectpass = $access->loggin($user,true);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootshop online Shopping cart</title>
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
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<hr class="soft"/>
	
	<div class="row">
		<div class="span4">
			<div class="well">
			<h5>CREATE YOUR ACCOUNT</h5><br/>
			<form action="register.php">
			  <div class="controls">
				<a href="register.php" role="button" style="padding-right:0"><span class="btn block">Create Your Account</span></a>
			  </div>
			</form>
		</div>
		</div>
		<div class="span1"> &nbsp;</div>
		<div class="span4">
			<div class="well">
			<h5>ALREADY REGISTERED ?</h5>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail1">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" id="inputEmail1" name="inputEmail1" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword1">Password</label>
				<div class="controls">
				  <input type="password" class="span3"  id="inputPassword1" name="inputPassword1" placeholder="Password">
				</div>
			  </div>
			  <div class="control-group">
				<div class="controls">
				<button type="submit" name="submitlog" class="btn" formmethod="post" >Sign in</button>
				<?php 
					if ($incorrectpass == true)
						echo 'Invaild username/password';
				?>
				</div>
			  </div>
			</form>
		</div>
		</div>
	</div>	
	
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
}
?>

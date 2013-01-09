<?php
	// if seesion_id is empty string then start a new session
	if(!session_id())
	{
		session_start();
	}
	
	if (!isset($_SESSION["productids"])) 
	{
		$itemCount = 0;
	}
	else {
		$itemCount = count($_SESSION['productids']);
	}
?>

<div id="header" class="borderstyle">
	<div id="logo">
		<img src="images/trash.png" style="margin:55px 0px 0px 40px; " alt="Logo"/>
	</div>
	<div id="company">
		<div id="companyname"></div>
		<div id="tagline"></div>
	</div>
	<div id="menu">
		<div id="cartDiv">
			<a href="orderreview.php" style="text-decoration:none;"><img src="images/cart.png" height="25px" alt="Cart" style="float:left;"/>
			<span id="itemcount"><?php echo $itemCount ?> items</span></a>
			<span style="float:right;">
			<?php include ("sessionvalues.php");
				 if(!isset($_SESSION['memId'])){ ?>
				<a href="login.php">Sign In</a>
				<?php }else{ ?>
				<a href="myaccount.php">My Account</a>
				<a href="signout.php">Sign Out</a>
				<?php } ?>
			</span>
		</div>
		<ul>
			<li>
				<a href=""><img src ="images/home.png" class="menuhome" alt="Home Menu"/></a>
			</li>
			<li>
				<a href="products.php"><img src="images/products.png" class="menuproducts" alt="Products Menu"/></a>
			</li>
			<li>
				<a href="forumspage1.php"><img src="images/forums.png" class="menuforum" alt="Forums Menu"/></a>
			</li>
			<li>
				<a href="games.php"><img src="images/games.png" class="menugames" alt="Games Menu"/></a>
			</li>
			<li>
				<a href="aboutus.php"><img src="images/aboutus.png" class="menuaboutus" alt="AboutUs Menu"/></a>
			</li>
			<li>
				<a href="contactus.php"><img src="images/contactus.png" class="menucontactus" alt="ContactUs Menu"/></a>
			</li>
		</ul>
	</div>
</div>
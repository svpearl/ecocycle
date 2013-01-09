<?php
	session_start();
	include('functions.php');

	$added_to_cart = false;
	$category_id;
	$product_id;
	$quantity;

	$con = get_db_connection();

	if (isset($_REQUEST['category_id'])) {
		$category_id = mysql_real_escape_string($_REQUEST['category_id']);
	}
	if (isset($_REQUEST['product_id'])) {
		$product_id = mysql_real_escape_string($_REQUEST['product_id']);
	}
	if (isset($_REQUEST['quantity'])) {
		$quantity = $_REQUEST['quantity'];
	}

	if (is_numeric($category_id) && id_exists_in_table('category', $category_id))
	{
		if (isset($product_id) && isset($quantity) && is_numeric($product_id)
			&& id_exists_in_table('product', $product_id)
			&& is_numeric($quantity)) {

			//&& ($quantity > 0) && ($quantity < 5)
			// add this product to the session variables for the cart
			// $_SESSION['productids'] holds a array of unique product ids
			// $_SESSION['quantity'] holds an array of quantity values
			add_to_cart($product_id, $quantity);
			$added_to_cart = true;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html charset=utf-8" />
		<title>Shop our ecostore</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<script type="text/javascript" src="javascript/jquery.js"></script>
	</head>
	
	<body class ='body'>
	<?php include("header.php");
	?>

	<!-- This is the transparent background that covers the screen when the popup is displayed -->
	<div class="overlay" id="overlay" style="display:none;"></div>

	<!-- This is the popup box that displays options after add to cart -->
	<div class="popupbox" id="popupbox">
		<a class="popupclose" id="popupclose"></a>
		<h2>Product added to Cart</h2>
		<p>
			<a class="popupclose" href="javascript:void(0)"><img src="images/continue_shopping.png" alt="Continue Shopping"/></a><br/><br/>
 			<a href="orderreview.php"><img src="images/viewcart.png" alt="View Cart"/></a>&nbsp;&nbsp;
 			<a href="orderreview.php"><img src="images/checkout.png" alt="Checkout"/></a>
 
 		</p>
	</div>

	<div id="products">
		<div id='cattitle'>
			<?php 
				$result = mysql_query("select name from category where id = " . $category_id);
				if ($row = mysql_fetch_array($result)) {
					$catname = $row['name'];
					echo "<h2>Our collection of " . $catname . "</h2>";
				}
				else
				{
					echo "<h4>Invalid category selected !</h4>";
				}
			?>
		</div>
		<div id='container'>
			<div id ='left'>
				<div id="categories">
					<span>Categories</span>
				</div>
				<ul class='pstyle'>
					<li><a href='productdetails.php?category_id=1'>Cups</a></li>
					<li><a href='productdetails.php?category_id=2'>Plates</a></li>
					<li><a href='productdetails.php?category_id=3'>Bowls</a></li>
					<li><a href='productdetails.php?category_id=4'>Food Containers</a></li>
					<li><a href='productdetails.php?category_id=5'>Bags</a></li>
					<li><a href='productdetails.php?category_id=6'>Stationaries</a></li>
				</ul>
			</div> <!-- end div left -->

			<div id='right'>
			<?php
  			$result = mysql_query("SELECT * FROM product WHERE category_id=" . $category_id);
  			while($row = mysql_fetch_array($result))
  			{
  			?>
	 		 <div class='proddetails'>
					<a href="#"><img src="<?php echo $row['imagepath']; ?>" alt="img1" width='200' height='200'/></a>
					<div class='prodtext'>
					<h3><?php echo $row['name']; ?></h3>
					<p> <?php echo $row['description']; ?></p>
					<p class='price'>Price: $ <?php echo $row['itemprice']; ?> </p>
					</div> <!-- end of prod text -->
					<div class='formdiv'>
						<p>Select Quantity</p>
						<form action="productDetails.php?category_id=<?php echo $category_id; ?>" method="post">
							<input type="hidden" name="product_id" value="<?php echo $row['id']; ?>"/>
							<select name="quantity">
								<option value='1'>1</option>
								<option value='2'>2</option>
								<option value='3'>3</option>
								<option value='4'>4</option>
							</select><br/><br/>
							<input type="submit" value=""/>
						</form>
					</div> <!-- end div formdiv -->
				</div> <!-- end div proddetails -->
			<?php } 

			mysql_close($con);
			?>
			</div> <!-- end div right -->
			
			<div id='cleardiv'></div>

		</div> <!--end div container -->
	</div> <!-- end div products -->

	<!-- If we actually added an item to a cart for this request, show a popup confirmation with options -->
	<?php
		if ($added_to_cart) {
			echo "<script type='text/javascript'>
				$(document).ready(function() {
			        $('#overlay').fadeIn('fast',function(){
       				    $('#popupbox').animate({'top':'160px'},500);
	        		});

				    $('.popupclose').click(function(){
						$('#popupbox').animate({'top':'-200px'},500,function(){
							$('#overlay').fadeOut('fast');
						});
					});
				});
			</script>";
		}
	?>
	<?php include("footer.php");
	?>
</body>
</html>

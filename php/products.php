<?php
	// if seesion_id is empty string then start a new session
	if(!session_id())
	{
		session_start();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html charset=utf-8" />
		<title>Products</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
	</head>
	
	<body class ='body'>
	<?php include("header.php");
	?>
	<div id="products">
		<div id='ptitle'>
			<h3>Welcome to the Eco Store!</h3>
				<p> We created this online store to save the environment and help our campus with zero waste by purchasing the products that were designed to be recycled or composed,and made using environmentally-friendly practices that reduce energy consumption, eliminate toxins and support healthy communities.Buying environmentally-friendly products is one of the most powerful ways you can "vote" for change, and we're here to make it easy!</p><br/>	
		</div>

		<div id='container'>
			<div id ='left'>
				<div id="categories"><span>Categories</span>
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
				<div class='image'>
					<a href="productdetails.php?category_id=1"><img src="./images/cup/art-cup2.jpg" alt="img1" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
			
				<div class ='image'>
					<a href="productdetails.php?category_id=1"><img src="./images/cup/glasscup.jpg" alt="img2" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class ='image'>
					<a href="productdetails.php?category_id=2"><img src="./images/plate/pyrex-plate.jpg" alt="img3" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=2"><img src="./images/plate/glass-snack-plate2.jpg" alt="img4" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
		
				<div class='image'>
					<a href="productdetails.php?category_id=3"><img src="./images/bowl/glass-snack-bowl.jpg" alt="img5" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=3"><img src="./images/bowl/mandala-bowl.jpg" alt="img6" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=4"><img src="./images/foodcontainer/hello-kitty-box.jpg" alt="img7" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=4"><img src="./images/foodcontainer/bento-box.jpg" alt="img8" width="200" height="200"/></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
	
				<div class='image'>
					<a href="productdetails.php?category_id=5"><img src="./images/bag/tote-bag.jpg" alt="img9" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=5"><img src="./images/bag/plastic-crocheted-bag.jpg" alt="img10" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=6"><img src="./images/stationary/books.jpg" alt="img11" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
				<div class='image'>
					<a href="productdetails.php?category_id=6"><img src="./images/stationary/files.jpg" alt="img12" width="200" height="200" /></a>
					<!-- <div class="desc">Add a description of the image here</div> -->
				</div>
				
			</div> <!-- end div right -->
			<div id='cleardiv'></div>
		</div> <!-- end div container -->
	</div> <!-- end div products -->
	<?php include("footer.php");
	?>
	</body>
</html>
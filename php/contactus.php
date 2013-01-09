<?php
	session_start();
	include('functions.php');
	$empname = $_REQUEST['empname'];
	$empmail = $_REQUEST['empmail'];
	$reason = $_REQUEST['reason'];
	$con = get_db_connection();
	$inserted = false;

	if (isset($empname) && isset($empmail) && isset($reason))
	{
		if (!mysql_query("INSERT INTO jobs (empname,empemail,reason) VALUES('$empname','$empmail','$reason')")) {
			die("Cannot insert into DB " . mysql_error());
		}
		$inserted = true;
	}
	mysql_close($con);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html charset=utf-8" />
  		<title>Contact Us</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<script type="text/javascript" src="javascript/jquery.js"></script>
	</head>
	<body class='body'>
    <?php include("header.php");
	?>
	<!-- This is the transparent background that covers the screen when the popup is displayed -->
	<div class="overlay" id="overlay" style="display:none;"></div>

	<!-- This is the popup box that displays options after add to cart -->
	<div class="popupbox" id="popupbox">
		<a class="popupclose" id="popupclose"></a>
		<h2>Thank you for your feedback.</h2>
	</div>
	
	<div id='content'>
	<div id='treeimg'>
		<img src='./images/tree.png' alt='tree'/>
	</div> <!-- end of treeimg -->
	<div id='ctitle'>
	<h1>Contact Us</h1>
	<h4>EcoCycle_DSV</h4>
	<p>	500 EL Camino Real <br/>
		Santa Clara, CA 95053, USA<br/>
		Call us: 408-551-1857 <br/>
		Email us: ecocycle.dsv@gmail.com
	</p>
	
</div> <!-- end of ctitle -->

<script type="text/javascript" src="javascript/contactus.js">
</script>

	<div id = 'ccontent'>
	 <h4> Feedback: </h4>
<!-- A form to submit -->
<form name="feedbackform" action="contactus.php" onsubmit="return validateForm();" method="post">
<table>
	<tr>
		<td> Name: </td>  
		<td> <input type="text"  name="empname" size="40" /></td>
   </tr>
	<tr>
		<td> Email Id: </td>
		<td> <input type="text" name="empmail" size="40" /></td>
	</tr>
</table>
<br/>
<br/>
<textarea name="reason" rows="10" cols="80"></textarea>
<br/>
<br/>
<input type="submit" id="btnsubmit" value="" />
</form>
</div> <!-- end of ccontent -->
</div> <!-- end of content -->

<!-- If we actually added an item to a cart for this request, show a popup confirmation with options -->
	<?php
		if ($inserted) {
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
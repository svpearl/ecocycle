<?php
	session_start();
	if(!isset($_SESSION['redirect_link']))
	{
		$_SESSION['redirect_link']=$_SERVER['HTTP_REFERER'];
	}
	include('functions.php');
	if (isset($_REQUEST['email']))
	{
		$username = $_REQUEST['email'];
	}
	if (isset($_REQUEST['password']))
	{
		$password = $_REQUEST['password'];
	}
	$loginfailed = false;
	if (isset($username) && isset($password)) {
		$con = get_db_connection();
		$query = sprintf("SELECT userName FROM member where userName='%s' and passWord='%s'",
						mysql_real_escape_string($username),
						mysql_real_escape_string($password));
		$result= mysql_query($query);
		
		// successful username and password match, redirect to the redirect link
		if(mysql_num_rows($result) > 0)
		{
			$pageurl = $_SESSION['redirect_link'];
			unset($_SESSION['redirect_link']);

			// set memId to indicate that user has logged in
			$_SESSION['memId'] = $username;

			// redirect to the referrer page
			header("Location: " . $pageurl);
			mysql_close($con);
			exit;
		}
		else
		{
			// Continue to display the login page with the login error message
			$loginfailed = true;
			mysql_close($con);
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html charset=utf-8" />
		<title>My acccount</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<script type="text/javascript" src="javascript/sha1.js"></script>
	</head>
	<body class ="body">
	<script type="text/javascript">
		function passwordhash()
		{
		    var uname = document.forms["loginform"]["email"].value;
		    if(uname == null || uname == "")
		    {
		    	alert("Enter the username");
		    	return false;
		    }
			var pwd = document.forms["loginform"]["password"].value;
			if(pwd == null || pwd == "")
			{
				alert("Enter the password");
				return false;
			}
			var shaObj = new jsSHA(pwd,"ASCII");
			var hash = shaObj.getHash("HEX");
			document.forms["loginform"]["password"].value = hash;
			return true;
		}
	</script>
	
	<?php include("header.php");
	?>
	<div id='lcontent'>
	<div id ='ltitle'>
	<h1>Sign In or Create an account</h1>				
	</div> <!-- end of atitle -->
	
	<div id='signing'>
	<div class='inup'>
		<div class='insideinup'>
		<h3> Sign In to your Account</h3>
		</div>
		<br/><br/>
		<form name="loginform" action="login.php" onsubmit="return passwordhash()" method="post">
			<br/><br/><br/>
 			Email Id &nbsp;<input type="text" name="email" size="30"/><br/><br/>
 			Password &nbsp;<input type="password" name="password" size="30"/><br/><br/>
		    <input type="submit" id="btnsignin" value=""/>
		    <br/><br/>
		    <a href="forgotpassword.php" style="color:black;">Forgot Password?</a> 
		    <?php
		    	if($loginfailed)
		    	{
		    		echo "<p> Incorrect Username or Password. </p>";
		    	}
		    ?>
  	 </form>
	</div> <!-- end of inup -->
		
	<div class='inup'>
	<div class='insideinup'>
	<h3>New Online Users</h3>
	</div>
	<br/><br/><br/>
	<h4>If you do not have an account,</h4>
	<p>please click "Continue" to register.</p><br/>
	<form name="continue" action="memberReg.php">
	<input type="submit" id="btncontinue" value=""/>
	</form>
	</div>
	</div> <!-- end of signing -->
	</div> <!-- end of lcontent-->
	<?php include("footer.php");
	?>
</body>
</html>
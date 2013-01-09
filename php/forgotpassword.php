<?php
	session_start();
	include('functions.php');
	if(!isset($_SESSION['pwdredirect_link']))
	{
		$_SESSION['pwdredirect_link']=$_SERVER['HTTP_REFERER'];
	}
	if (isset($_REQUEST['email']))
	{
		$username = $_REQUEST['email'];
	}

	$loginfailed = false;
	$mailSendError = false;

	if (isset($username)) {
		$con = get_db_connection();
		$query = sprintf("SELECT userName FROM member where userName='%s'",
						mysql_real_escape_string($username));
		$result= mysql_query($query);
		
		// successful username match, redirect to the redirect link
		if(mysql_num_rows($result) > 0)
		{
			$password = create_random_password();
			$hash_password = sha1($password);
			$query = sprintf("UPDATE member SET passWord ='%s' Where userName = '%s'",
					$hash_password, mysql_real_escape_string ($username));
			$result = mysql_query($query);

			$subject = "Your Ecocycle_DSV Account";
			$message = "This is the temporary password for your Ecocycle_DSV account: ". $password
						. ". Use this to login and reset your password in My Account section";
			require_once "Mail.php";
			$result = send_email($username,$subject,$message);
			
			/*if ($result)
			{*/
				$pageurl = $_SESSION['pwdredirect_link'];
				unset($_SESSION['pwdredirect_link']);

				// set memId to indicate that user has logged in
				//	$_SESSION['memId'] = $username;

				// redirect to the referrer page
				header("Location: " . $pageurl);
				mysql_close($con);
				exit;
			/*}
			else
			{
				$mailSendError = true;
			}*/
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
		<title>Password Reset</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/header.css"/>
		<script type="text/javascript" src="javascript/sha1.js"></script>
	</head>
	<body class ="body">
	<script type="text/javascript">
		function validateEmail()
		{
		    var uname = document.forms["forgotform"]["email"].value;
		    if(uname == null || uname == "")
		    {
		    	alert("Enter the email Id");
		    	return false;
		    }
		    alert("Email has been sent");
		    return true;
		}
	</script>
	
	<?php include("header.php");
	?>
	<div id='lcontent'>
	<div id='treeimg'>
		<img src='./images/tree.png' alt='tree'/>
	</div>
	<div id ='ftitle' style="padding:10px;">
	<h4> Enter the email address associated with your Ecocycle_DSV account, then click Submit.</h4>
	<p>We'll send you an email with a password to login.</p>				
	</div> <!-- end of ftitle -->
	
	<div id='signing'>
	<div class='inup'>
		<div class='insideinup'>
		<h3>Forgot Your Password</h3>
		</div>
		<br/><br/>
		<form name="forgotform" action="forgotpassword.php" onsubmit="return validateEmail()" method="post">
			<br/><br/><br/>
 			Email Id &nbsp;<input type="text" name="email" size="30"/><br/><br/>
		    <input type="submit" id="btnsubmit" value=""/>
		    
		    <br/><br/>
		    <?php
		    	if($loginfailed)
		    	{
		    		echo "<p> Invalid Email Id</p>";
		    	}
		    	else if ($mailSendError) {
		    		echo "<p> Error while sending password recovery email. Please try again later or contact Customer Support</p>";
		    	}
		    ?>
  	 </form>
	</div> <!-- end of inup -->
	</div> <!-- end of signing -->
	</div> <!-- end of lcontent-->
	<?php include("footer.php");
	?>
</body>
</html>
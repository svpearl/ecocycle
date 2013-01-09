<?php
	$to = "sneha.21386@gmail.com";
	$subject = "Test email";
	$message = "This is a test email from php !!!";
	$result = mail($to, $subject, $message);
	echo "Result of sending email to " . $to . " : " . $result;
?>

<!--
<?php
	$from = "<sneha2186@gmail.com>";
	$to = "<karthik.murthy@gmail.com>";
	$subject = "Hi baby";
	$body = "I LOVE YOU";

	$osname = php_uname('s');
	if (preg_match('/^WIN/', $osname)) {	
		require_once "Mail.php";
		$to = "<karthik.murthy@gmail.com>";
	
		$host = "ssl://smtp.gmail.com";
		$port = "465";
		$username = "sneha2186@gmail.com";
		$password = "sk212j30";
	
		$headers = array('From' => $from, 'To' => $to, 'Subject' => $subject);
		$smtp = Mail::factory('smtp',array('host' => $host, 'port' => $port, 'auth' => true, 
								'username' => $username, 'password' => $password));
	
		$mail = $smtp->send($to,$headers,$body);
	
		if (PEAR::isError($mail))
		{
			echo("<p>".$mail->getMessage(). "</p>");
		}
		else {
			echo("<p> Message successfully sent via Mail.php! </p>");
		}
	}
	else
	{
		$to = "karthik.murthy@gmail.com";
		$result = mail($to, $subject, $body);
		if ($result == true) {
			echo "Mail was succesfully sent to " . $to;
		} else {
			echo "Mail sending via sendmail failed";
		}
	}

?>
-->
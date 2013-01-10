<?php
	$to = "bar@example.com";
	$subject = "Test email";
	$message = "This is a test email from php !!!";
	$result = mail($to, $subject, $message);
	echo "Result of sending email to " . $to . " : " . $result;
?>

<!--
<?php
	$from = "<foo@example.com>";
	$to = "<bar@example.com>";
	$subject = "Hi";
	$body = "This is test mail";

	$osname = php_uname('s');
	if (preg_match('/^WIN/', $osname)) {	
		require_once "Mail.php";
		$to = "<foo@example.com>";
	
		$host = "ssl://smtp.gmail.com";
		$port = "465";
		$username = "bar@example.com";
		$password = "foobar1234";
	
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
		$to = "foo@example.com";
		$result = mail($to, $subject, $body);
		if ($result == true) {
			echo "Mail was succesfully sent to " . $to;
		} else {
			echo "Mail sending via sendmail failed";
		}
	}

?>
-->

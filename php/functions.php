<?php
function get_db_connection()
{
	$con = mysql_connect("localhost","root","root")
		or die("Could not connect to database. Please try again later: " . mysql_error());
	mysql_select_db("eco_cycle", $con) or die("Could not select database" . mysql_error());
	return $con;
}

function add_to_cart($product_id, $quantity)
{ 
	if (!isset($_SESSION["productids"])) // check if productids array is in session. If not create it.
	{
		$_SESSION['productids'] = array();
		$_SESSION['quantities'] = array();
	}
	
	$i=0;
	//check for current product in visitor's shopping cart content 
	while ($i < count($_SESSION['productids']) && $_SESSION['productids'][$i] != $product_id) $i++;

	if ($i < count($_SESSION['productids'])) //increase current product's item quantity
        {
        	// 
         	$_SESSION['quantities'][$i] += $quantity;
            //$_SESSION['quantities'][$i]++;
            //print_r ($_SESSION['quantities']);
            
        } 
        //no such product in the cart - add it to the cart
        else {
        	$_SESSION['productids'][] = $product_id;
            $_SESSION['quantities'][] = $quantity;
        }
}

function remove_from_cart($product_id)
{
    if (isset($product_id) && (int)($product_id) > 0) 
    {
        $i=0;
        while ($i<count($_SESSION['productids']) && $_SESSION['productids'][$i] != (int)($product_id))
            $i++;
        if ($i<count($_SESSION['productids']))
            $_SESSION['productids'][$i] = 0;
            $_SESSION['quantities'][$i] = 0;
    }
}

function id_exists_in_table($table, $id)
{
	$query = "select id from ". $table . " where id=" . $id;
	return mysql_num_rows(mysql_query($query)) > 0;
}

function create_category_list($dbconn)
{
	$result = mysql_query("select id, name from category");
	while ($row = mysql_select_row($result)) {
		echo "<li><a href='productdetails.php?&category_id=" . $row['id'] . ">" . $row['name'] . "</a></li>\n";
	}
}


function create_random_password() 
{
	 $chars = "abcdefghijkmnopqrstuvwxyz023456789";
	 srand((double)microtime()*1000000);
	 $i = 0;
	 $pass = '' ;
	while ($i <= 7) 
	{
		 $num = rand() % 33;
		 $tmp = substr($chars, $num, 1);
		 $pass = $pass . $tmp;
		 $i++;
    }
    return $pass;
}

function send_email($username,$subject,$message)
{
	//$result = mail($username, $subject, $message);
	//return $result;
	$from = "<ecocycle.dsv@gmail.com>";
	$subject = $subject;
	
	$osname = php_uname('s');
	if (preg_match('/^WIN/', $osname))
	{
		require_once "Mail.php";
		$to = "<". $username .">";
		$host = "ssl://smtp.gmail.com";
		$port = "465";
		$username = "ecocycle.dsv@gmail.com";
		$password = "gogreendsv";
	
		$headers = array('From' => $from, 'To' => $to, 'Subject' => $subject);
		$smtp = Mail::factory('smtp',array('host' => $host, 'port' => $port, 'auth' => true, 
							'username' => $username, 'password' => $password));
	
		$mail = $smtp->send($to,$headers,$message);
		return $mail;
    }
	else 
	{
		error_log("Sending mail to " . $username . " with subject " . $subject);
		$result = mail($username, $subject, $message);
		return $result;
/*		if ($result == true) {
			echo "Mail was succesfully sent to " . $to;
		} else {
			echo "Mail sending via sendmail failed";
		}
*/
	}	
}

?>
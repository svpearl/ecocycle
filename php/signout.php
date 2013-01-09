<?php
include ("sessionvalues.php");
unset($_SESSION['memId']);
header("Location: login.php");
?>
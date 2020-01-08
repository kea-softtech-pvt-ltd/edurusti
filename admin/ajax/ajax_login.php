<?php

include_once('../includes/application_top_no_login.php');
include_once('../class/login.php');

$log = new Login();
$mobile = $_POST['username'];
$password = $_POST['password'];
$result = $log->loginCheck($mobile, $password);
$num = count($result);
if($num > 0)
{
	$_SESSION['admin_id'] = $result[0]['admin_id'];
	$_SESSION['role'] = $result[0]['role'];
	$_SESSION['mobile'] = $result[0]['mobile'];
	$_SESSION['name'] = $result[0]['full_name'];
	echo "success";
}
else
{
	echo "error";
}	
?>
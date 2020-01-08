<?php

// session started
session_start();

// include common files 
include_once('config.php');
include_once('constant.php');
include_once('dbtables.php');

// get database connection
include_once('database.php');
include_once('functions.php');

if(empty($_SESSION['admin_id']))
{
	header('Location:index.php');	
}

if(isset($_SESSION['role']) and $_SESSION['role'] == '2')
{
	$pageName = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
	$pages = array('pickup_order','deliver_order','profile','ajax_repair','genrate_invoice');
	if(!in_array($pageName,$pages))
	{	
		header('Location:pickup_order.php');
	}
}	

?>	
<?php
include_once('includes/application_top.php');
if(!isset($_SESSION['mobile_number']))
{
	?><script>window.location='/';</script><?php
}
?>
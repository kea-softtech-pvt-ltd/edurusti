<?php
include_once('class/logo.php');
include_once('header.php');

/*
$query = "select * from logo";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
*/

$log = new Logo($db);
$logo = $log->getAllLogo();
$num = count($logo);

include('template/list_images.tpl.php');
?>

<?php
include_once('class/repair.php');
include_once('header.php');

/*
$query = "select * from logo";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);
*/

$Repair_mob = new Repair($db);

$Repair_mob = $Repair_mob->getAllCutomer_data();
$num = count($Repair_mob);
include('template/customer-list.tpl.php');
?>

<?php

include_once('header.php');

include_once('class/repair.php');

$Repair = new Repair($db);

$Repair_mob = $Repair->get_all_scheduled_orders();

$num = count($Repair_mob);

include('template/pickup_order.tpl.php');

?>


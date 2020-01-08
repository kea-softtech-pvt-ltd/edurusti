<?php

include_once('header.php');

include_once('class/repair.php');

$Repair = new Repair($db);

$Repair_mob = $Repair->get_all_shipped_orders();

$num = count($Repair_mob);

include('template/deliver_order.tpl.php');

?>


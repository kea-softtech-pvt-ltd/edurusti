<?php

// include header

include_once('header.php');

include_once('class/mobile_repair_class.php');









$doc = new Mobile_repair_class();

$category = $doc->getAllcategory();

$num = count($category);



//echo "<pre/>";

//print_r($doctors);

//die;





// include tpl

include('template/brand_list.tpl.php');

?> 
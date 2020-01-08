<?php

// include header

include_once('class/cate_sub.php');

include('header.php');



$catesub = new Cate_sub($db);

$cate_sub = $catesub->getAllcate_sub();

$num = count($cate_sub);

include('template/model_list.tpl.php');

?>
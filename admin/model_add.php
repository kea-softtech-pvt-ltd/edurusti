<?php
include_once('header.php');
include_once('class/cate_sub.php');
$sch = new Cate_sub($db);
include_once('template/model_add.tpl.php');
?>
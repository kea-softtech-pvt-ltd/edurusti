<?php

// include header
include_once('class/keywords.php');
include_once('header.php');

$keywords = new keywords();
$keywords_list = $keywords->getall_keywords_list();
$num = count($keywords_list);
include_once('template/seo_list.tpl.php');

?> 
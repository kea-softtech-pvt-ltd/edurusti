<?php
// include header
include_once('class/issue_mobile.php');
include_once('header.php');

$issue = new Issue_mobile();
$issue_list = $issue->getallissue_list();
$num = count($issue_list);

// include tpl

include_once('template/issues_list.tpl.php');
?> 
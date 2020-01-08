<?php

// include header

include_once('header.php');

include_once('class/repair.php');

$repair = new repair($db);

$feedbacks = $repair->get_all_feedbacks();

$num = count($feedbacks);

include('template/feedback_list.tpl.php');

?> 
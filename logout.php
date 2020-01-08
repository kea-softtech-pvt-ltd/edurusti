<?php
include_once('includes/application_top.php');
session_destroy();
unset($_SESSION['mobile_number']);
?>
<script>window.location='./';</script>
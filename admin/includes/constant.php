<?php
// host name
$http_host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://".$_SERVER['HTTP_HOST'] : "http://".$_SERVER['HTTP_HOST']); 

// base_url
define('BASE_URL',$http_host.'/admin/');

// user image upload 
define('base_url_image',BASE_URL.'upload/');

// service provider / shop owner mobile number
define('ADMIN_MOBILE_NUMBER','+917709084510');

?>
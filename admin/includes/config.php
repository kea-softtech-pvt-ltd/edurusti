<?php

// set GMT time zone
date_default_timezone_set('UTC');

// set GMT/UTC date time
$_TODAY = date('Y-m-d H:i:s');
$_DATE = date('Y-m-d');
$_TIME = date('H:i:s');

// Turn off all error reporting
error_reporting(E_ALL); // E_ALL
ini_set('display_errors', 1); // set 1 to on

// check host
if($_SERVER['HTTP_HOST'] == 'localhost')
{
	// database connection for local
	define('hostname','localhost');
	define('username','root');
	define('password','');
	define('dbname','testm');
	
	// development mode
	define('dev_mode',1);
}
else
{	
	// database connection for production
	define('hostname','localhost');
	define('username','edurusti');
	define('password','4x)VWF+nI@-x');
	define('dbname','edurusti');
	
	// development mode
	define('dev_mode',1);
}

// SMS gayway ID Key
define('TEXTLOCAL_ID','info@keasofttech.com');
define('TEXTLOCAL_KEY','YBzNv++3trI-OjGn7uQnRiEfE6LmKaZ4JtriZ8MIvX');
define('TEXTLOCAL_EDURUST','DURUST');

//password key
define('password_key','edurusti@123');

?>	
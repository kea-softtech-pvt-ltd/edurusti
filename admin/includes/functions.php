<?php

function base64_url_encode($input) 
{
	return strtr(base64_encode($input), '+/=', '._-');
}

function base64_url_decode($input) 
{
	return base64_decode(strtr($input, '._-', '+/='));
}

function generate_otp()
{
	$string = '0123456789';
	$string_shuffled = str_shuffle($string);
	$otp = substr($string_shuffled, 0, 6);
	return $otp;
}

function test($name)
{
	return $name; 
}

?>
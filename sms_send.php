<?php
// require 'textlocal.class.php';
// 	$textlocal=new Textlocal('info@keasofttech.com',true,'YBzNv++3trI-OjGn7uQnRiEfE6LmKaZ4JtriZ8MIvX');
// 	$textlocal->sendSms(array(9730501945),'TEST MESSAGE','DURUST');

	require('textlocal.class.php');
 
	$Textlocal = new Textlocal('info@keasofttech.com',true,'YBzNv++3trI-OjGn7uQnRiEfE6LmKaZ4JtriZ8MIvX');
 
	$numbers = array(8378989159);
	$sender = 'DURUST';

	$no = "ORDER12356";
	$message = "Thank you for choosing eDurusti for repair for your phone! Your order number is " .$no. ". Our executive will call you shortly.";
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	print_r($response);

?>
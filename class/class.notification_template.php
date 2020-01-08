<?php

// class for email and SMS notification html template 	

class NotificationTemplate

{

	//constructor

	public function __construct()

	{

		//constructor 

	}		
	

	// check customer exist

	function order_confirm_customer_template()

	{

		$html = "Thank you for choosing eDurusti to repair your phone! Your order number is #ORDER_NUMBER. Our executive will call you shortly.";

		return $html; 	

	}
	
	function order_confirm_admin_template()

	{

		$html = "You have got a new request on eDurusti from +91 #CUSTOMER_MOBILE_NUMBER with order number #ORDER_NUMBER. Please kindly assist request.";

		return $html; 	

	}
	
	// check customer exist

	function order_canecel_customer_template()

	{

		$html = "Thank you for choosing eDurusti for repair for your phone! Your order number is #ORDER_NUMBER. Our executive will call you shortly.";

		return $html; 	

	}
	
	function order_canecel_admin_template()

	{

		$html = "You have got a new request on eDurusti from +91#CUSTOMER_MOBILE_NUMBER with order number #ORDER_NUMBER. Please kindly assist request.";

		return $html; 	

	}
	
	function send_otp_template()

	{

		$html = "Dear Customer, Your OTP is # #OTP. Please do not share your OTP with anyone. From - eDurusti";

		return $html; 	

	}
	
}	


?>
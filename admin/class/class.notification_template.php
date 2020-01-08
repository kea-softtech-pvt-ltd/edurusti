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

	function update_status_customer_template()

	{

		$html = "Dear Customer, Your order number #ORDER_NUMBER has been repaired. Our executive will call you shortly.";

		return $html; 	

	}
	
		
	// check customer exist

	function order_cancel_customer_template()

	{

		$html = "Dear Customer, Thank you for choosing eDurusti for repair for your phone! Your order number #ORDER_NUMBER has been cancelled by admin.";

		return $html; 	

	}
	
	function send_invoice_template()

	{

		$html = "Dear Customer, Your order number #ORDER_NUMBER has been repaired. Your bill amount is #BILLAMOUNT  From - eDurusti";

		return $html; 	

	}
	
	function send_otp_template()

	{

		$html = "Dear Customer, Your OTP is # #OTP. Please do not share your OTP with anyone. From - eDurusti";

		return $html; 	

	}
	
}	


?>
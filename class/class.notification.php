<?php

require('textlocal.class.php');
include_once("class.notification_template.php");

// class for Notification 	

class Notification

{

	private $Textlocal;
	private $NotificationTemplate;
	private $textID;
	private $apiKEY;

	public function __construct()

	{
		$this->notificationTemplate = new NotificationTemplate();
		$this->apiKEY = urlencode(TEXTLOCAL_KEY);
		$this->textID = urlencode(TEXTLOCAL_EDURUST);
	}		

	function sendSMS($numbers, $message) 
	
	{
		if(dev_mode) return true;
		
		// Prepare data for POST request
		$numbers = implode(',', $numbers);
		$data = array('apikey' => $this->apiKEY, 'numbers' => $numbers, "sender" => $this->textID, "message" => rawurlencode($message));
		// Send the POST request with cURL
		$ch = curl_init('https://api.textlocal.in/send/');
		
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		
		curl_close($ch);
		//echo $response;
		
		return true;
	}
	

	// order_confirm_notification

	function order_confirm_notification($data)

	{

		$customer_html = $this->notificationTemplate->order_confirm_customer_template();		
		$customer_html = str_replace('#ORDER_NUMBER',$data['order_number'],$customer_html);	
		$this->sendSMS(array($data['mobile_number']),$customer_html);

		$admin_html = $this->notificationTemplate->order_confirm_admin_template();		
		$admin_html = str_replace('#CUSTOMER_MOBILE_NUMBER',$data['mobile_number'],$admin_html);
		$admin_html = str_replace('#ORDER_NUMBER',$data['order_number'],$admin_html);
		$this->sendSMS(array(ADMIN_MOBILE_NUMBER),$admin_html);	
		
		return 1; 	

	}
	
	// order_canecel_notification

	function order_canecel_notification($data)

	{

		$customer_html = $this->notificationTemplate->order_canecel_customer_template();		
		$customer_html = str_replace('#ORDER_NUMBER',$data['order_number'],$customer_html);		
		
		$this->sendSms(array($data['mobile_number']),$customer_html,TEXTLOCAL_EDURUST);
				
		$admin_html = $this->notificationTemplate->order_canecel_admin_template();		
		$admin_html = str_replace('#CUSTOMER_MOBILE_NUMBER',$data['mobile_number'],$admin_html);
		$admin_html = str_replace('#ORDER_NUMBER',$data['order_number'],$admin_html);
		
		$this->sendSms(array(ADMIN_MOBILE_NUMBER),$admin_html,TEXTLOCAL_EDURUST);
		
		return 1; 	

	}
	
	// order_confirm_notification

	function send_otp($data)

	{
	    
	    $otp_html = $this->notificationTemplate->send_otp_template();		
		$otp_html = str_replace('#OTP',$data['otp'],$otp_html);		
		
		if($this->sendSms(array($data['mobile_number']),$otp_html,TEXTLOCAL_EDURUST))
			return 1;
		else
			return 0;
		
	}
		
}	



?>
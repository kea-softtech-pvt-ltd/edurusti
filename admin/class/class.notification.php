<?php

include_once("textlocal.class.php");
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

		//constructor 
		//$this->textlocal = new Textlocal(TEXTLOCAL_ID,TEXTLOCAL_KEY);
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
	
	
	// update_status_notification

	function update_status_notification($data)

	{

		$customer_html = $this->notificationTemplate->update_status_customer_template();		
		$customer_html = str_replace('#ORDER_NUMBER',$data['order_id'],$customer_html);		
				
		$this->sendSms(array($data['mobile_number']),$customer_html);
				
		return 1; 	

	}
	
	// order_canecel_notification

	function order_cancel_notification($data,$order_number)

	{

		$customer_html = $this->notificationTemplate->order_cancel_customer_template();		
		$customer_html = str_replace('#ORDER_NUMBER',$order_number,$customer_html);		
		
		$this->sendSms(array($data['mobile_number']),$customer_html);
		return 1; 	

	}
	
	// order_confirm_notification

	function send_invoice($data)

	{

		$otp_html = $this->notificationTemplate->send_invoice_template();		
		$otp_html = str_replace('#OTP',$data['otp'],$otp_html);		
		
		if($this->sendSms(array($data['mobile_number']),$otp_html))
			return 1;
		else
			return 0;
		
	}
	
	// order_confirm_notification

	function send_otp($data)

	{
	    
	    $otp_html = $this->notificationTemplate->send_otp_template();		
		$otp_html = str_replace('#OTP',$data['otp'],$otp_html);		
		
		if($this->sendSms(array($data['mobile_number']),$otp_html))
			return 1;
		else
			return 0;
		
	}
		
}	



?>
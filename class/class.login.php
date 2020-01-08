<?php

include_once("class.notification.php");

// class for Login 	

class Login 

{

	public $db;
	private $Notification; 
	

	//constructor

	public function __construct($db_conn)

	{

		//constructor 

		$this->db = $db_conn;
		$this->notification = new Notification();

	}		

	// check customer exist

	function check_customer($mobile)

	{

		$this->db->where("mobile_number", $mobile);

		$result = $this->db->getOne("customer");

		return $result; 	

	}
	
	// check customer login

	function check_login($mobile,$password)

	{
		
		$this->db->where("mobile_number", $mobile);
		
		$this->db->where("password", $password);
		
		$this->db->where("is_verified", "1");

		$result = $this->db->getOne("customer");

		return $result;
	}

	/* register new user */

	function register_customer($data)

	{						

		if($this->db->insert('customer',$data))
		{
			if($this->notification->send_otp($data)) 
				return 1;
			else
				return 0; 
		}
		else

			return 0;

	}

	// update customer 

	function reset_password($data,$cust_id)

	{		

		$this->db->where('cust_id',$cust_id);

		if($this->db->update('customer',$data)) {

			$this->db->where("cust_id", $cust_id);
			$result = $this->db->getOne("customer");
			return $result; 			

		} else

			return array();

	}
	
	// update customer 

	function update_otp($mobile_number,$data)

	{		

		$this->db->where('mobile_number',$mobile_number);

		if($this->db->update('customer',$data))

			if($this->notification->send_otp($data)) 
				return 1;
			else
				return 0;			

		else

			return 0;

	}
	
	// update customer 

	function set_verified($mobile_number)

	{		

		$data = array('is_verified' => '1');		
		
		$this->db->where('mobile_number',$mobile_number);
		
		if($this->db->update('customer',$data)) 
			
			return 1; 			

		else

			return 0;

	}
}	



?>
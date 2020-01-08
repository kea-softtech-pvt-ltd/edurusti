<?php

include_once("class.notification.php");

// class for Customer 	

class Customer 

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

	

	// update customer 

	function update_otp($mobile_number,$data)

	{		

		$this->db->where('mobile_number',$mobile_number);

		if($this->db->update('customer',$data))

			return 1;			

		else

			return 0;

	}

	

	/* register new user */

	function register_number($data)

	{						

		if($this->db->insert('customer',$data))

			return 1;			

		else

			return 0;

	}

	

	// set customer personal information

	function setPersonalInformation($data,$cust_id)

	{	

		$this->db->where('cust_id',$cust_id);

		if($this->db->update('customer',$data))

			return 1;			

		else

			return 0; 

	}

		

	// get customer personal information 

	function getCustomerInformation($cust_id)

	{			

		$this->db->where("cust_id", $cust_id);

		$result = $this->db->getOne("customer");

		return $result; 

	}

	

	// get all customer personal information 

	function getAllCustomerInformation($cust_id)

	{			

		$result = $this->db->rawQuery("select * from customer where status ='1'");

		return $result; 

	}

	

	// get all customer personal information 

	function genrateOrderNumber($number)

	{			

		$preFix = 'ED'.substr('000000',0,6-strlen($number));

		return $preFix.$number; 

	}

	

	// set oder personal information

	function setTracking($data)

	{	

		$result = $this->db->insert('tracking', $data);

		if($result)
			
		{

			$noti_data = array(
				'mobile_number' => $_SESSION['mobile_number'],
				'order_number' => $data['order_id']
				);
			
			$this->notification->order_confirm_notification($noti_data);
			
			return 1;
		
		}
		else

			return 0; 

	}

	

	// set oder personal information

	function setOrder($data)

	{	

		$result = $this->db->insert('order_master', $data);

		if($result)

		{

			$order_number = $this->genrateOrderNumber($result);

			$this->db->where('ord_id',$result);

			if($this->db->update('order_master',array('order_number'=>$order_number))) 

				return $order_number;			

			else

				return 0; 

		}

		else

			return 0; 

	}

	function getStatusOfOrder($orderId) 
	
	{
		
		return $this->db->rawQueryOne("select *, MAX(status) as track_status from tracking where order_id ='".$orderId."' order by track_id DESC");
	
	}

	// get all customer personal information 

	function getAllOrders($cust_id)

	{			

		$result = $this->db->rawQuery("select *, b.brand_name, m.model_name, o.status as order_status, f.order_id from order_master as o left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model left join feedback f on f.order_id = o.ord_id where o.status ='1' and o.cust_id = '".$cust_id."' order by o.ord_id DESC");

		return $result; 

	}

	

	// get all customer personal information 

	function getAllCancelledOrders($cust_id)

	{			
		
		$result = $this->db->rawQuery("select *, b.brand_name, m.model_name, o.created_date as order_date from order_master as o left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model where o.status ='3' and o.cust_id = '".$cust_id."' order by o.ord_id DESC");

		return $result; 

	}

	

	// get all customer personal information 

	function getOrderTrackingStatus($track_id)

	{			
	
		return $result = $this->db->rawQuery("select track_id from tracking where order_id = '".$track_id."'");

	}
	
	// get all customer personal information 

	function is_order_canecelled($order_number)

	{			
	
		$status = $this->db->rawQueryone("select status from order_master where order_number = '".$order_number."'");
		
		return $status;
		
	}

	

	// get all brands 

	function getAllBrands()

	{

		$result = $this->db->rawQuery("select * from brand where isDeleted = '0'");

		return $result; 

	}

	

	// get all models 

	function getAllModels()

	{

		return $this->db->rawQuery("SELECT * FROM model INNER JOIN brand ON model.brand_id = brand.brand_id where model.isDeleted='0' order by model_name desc");			

	}

	

	// get models

	function getModels($brand_id)

	{

		return $this->db->rawQuery("SELECT * FROM model where model.isDeleted = '0' and brand_id = '".$brand_id."' order by model_name desc");

	}	

	

	// get all getAllIssues 

	function getAllIssues()

	{

		return $this->db->rawQuery("SELECT issues_id, title FROM issues where status = '1' order by title desc");			

	}

	

	// get all deleteOrder 

	function deleteOrder($ord_id)

	{

		$this->db->where('ord_id', $ord_id);

		if($this->db->delete('order_master'))

			return 1;

		else

			return 0;	

	}

	

	// get all cancelOrder 

	function cancelOrder($ord_id)

	{

		$this->db->where('ord_id',$ord_id);

		if($this->db->update('order_master',array('status'=>'3'))) 
		{	
			
			$noti_data = array(
				'mobile_number' => $_SESSION['mobile_number'],
				'order_number' => $ord_id
				);
			
			$this->notification->order_canecel_notification($noti_data);
			
			return 1;
			
		}
		else

			return 0;

	}

	

	// get all getCancelOrderDetails 

	function getCancelOrderDetails($ord_id)

	{

		//$this->db->where("ord_id", $ord_id);

		//$result = $this->db->getOne("order_master");
		
		$result =  $this->db->rawQueryOne("select *, group_concat(i.title) as issues from order_master o left join issues i on o.issues_id = i.issues_id where o.ord_id ='".$ord_id."'");

		return $result; 

	}

	function getBanners()
	
	{
		
		return $this->db->rawQuery("SELECT image_path FROM banner where status = '1' order by created_date desc");
		
	}
	
	function getFeedbacks()
	
	{
		
		return $this->db->rawQuery("select f.feedback_id, f.feedback, f.feedback_by, f.status, f.created_date, c.full_name, c.mobile_number from feedback f, customer c where  c.cust_id = f.feedback_by and f.status = '1'");
		
	}
	
	
	function orderFeedback($data)
	
	{
		
		if($this->db->insert('feedback',$data))
		
			return 1; 
		
		else

			return 0;
		
	}
	
}	



?>
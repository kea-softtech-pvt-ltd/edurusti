<?php

	include_once("class.notification.php");

    //class for logo

    class repair

	{

		public $db;
		private $Notification;
		//constructor

		public function __construct($_db)

		{

			$this->db = $_db;
			$this->notification = new Notification();
			//constructor 

		}

		

		/* Member functions */

		function getAllrepair_data()

		{

			//global $db; get all details for mobile customer

			return $this->db->rawQuery("select *, b.brand_name, m.model_name, o.status as order_status from order_master as o left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model where 1=1 ORDER BY o.ord_id DESC");

		}
		function getAllcustomerdata($id)
		{
			//global $db; get all details for mobile customer
			$result =  $this->db->rawQueryOne("select *, b.brand_name, m.model_name, o.status as order_status from order_master as o left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model left join customer as c on c.cust_id = o.cust_id where 1=1 and o.ord_id='".$id."'");
			return $result; 
		}

		/* Member functions */
        function getAllissue($issues_id){
			 return $this->db->rawQuery("select * from issues where issues_id in ($issues_id)");
		}
		function getAllCutomer_data() 
		{

			//global $db;

			return $this->db->rawQuery("select * from customer");

		}
		
		function getAllSubadmin_data() 
		{

			//global $db;

			return $this->db->rawQuery("select * from admin where role = '2'");

		}

		

		/* Member functions */

		function getrepair($id)

		{

			//global $db;
			$sql = "select * from order_master om LEFT JOIN brand mr ON om.brand_id=mr.brand_id LEFT JOIN model cs ON om.model=cs.model_id LEFT JOIN customer c ON om.cust_id=c.cust_id where ord_id = '".$id."'";
			$result = $this->db->rawQueryOne($sql);

			return $result; 

		}

		

		/* Member functions */

		function getCustomer($id)

		{

			//global $db;

			$result = $this->db->rawQueryOne("select * from customer where cust_id = '".$id."'");

			return $result; 

		}

		//repair issues

		function get_repair_issues($id)

		{

			//global $db;
			
			return $this->db->rawQuery("select description,title from issues where issues_id in ($id)");

		}

		function Repair_status($id)

		{

			//global $db;'
			//echo "select *, MAX(status) as track_status from tracking where order_id ='".$id."'";
			return $this->db->rawQueryOne("select *, MAX(status) as track_status, (select status from order_master where order_number = '".$id."') as order_status from tracking where order_id ='".$id."' order by track_id DESC");

		}	
        function order_cancel($data,$id)
		{
			$this->db->where('order_number',$id);

			if($this->db->update('order_master',$data))	 {
				$data['mobile_number'] = $this->db->rawQueryone("select mobile_number from customer where cust_id = (select cust_id from order_master where order_number = '".$id."')");
				$this->notification->order_cancel_notification($data,$id);
				return 1;
			} else
				return 0;
			
		}
		function add_track($data,$track_status)

		{

			//global $db;
			//echo $track_status.'<br/>';
			$status = $data['status'];
			//die;
			for($i = $track_status+1; $i <= $status; $i++)
			{
				$data['status'] = $i;
				$this->db->insert('tracking',$data);
			}	
			
			if($status == 6)
			{
				$data['mobile_number'] = $this->db->rawQueryone("select mobile_number from customer where cust_id = '".$data['cust_id']."'");
				//$this->notification->update_status_notification($data);
			}
			
			
			if(1)

				return 1;

			else

				return 0;

		}

		function addLogo($data)

		{

			//global $db;

			if($this->db->insert('logo',$data))

				return 1;

			else

				return 0;

		}
	
		function get_all_feedbacks()

		{

			//global $db;
			return $this->db->rawQuery("select f.feedback_id, f.feedback, f.feedback_by, f.status, f.created_date, c.full_name, c.mobile_number from feedback f, customer c where  c.cust_id = f.feedback_by and f.status < '2'");

		}
		
		
		function get_all_shipped_orders()

		{

			//global $db; get all details for mobile customer

			return $this->db->rawQuery("select *, b.brand_name, m.model_name, o.status as order_status, o.order_number as order_number, c.full_name, (select status from tracking where order_id = order_number order by status DESC limit 1) as track_status from customer c left join order_master as o on c.cust_id = o.cust_id left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model where c.status = '1' ORDER BY o.ord_id DESC");

		}
				
		function generate_otp_delivery($cust_id,$data)

		{		

			$this->db->where('cust_id',$cust_id);

			if($this->db->update('customer',$data))
			{
				$this->db->where("cust_id", $cust_id);
				$row = $this->db->getOne("customer");
				$data['mobile_number'] = $row['mobile_number'];
				
				if($this->notification->send_otp($data)) 
					return 1;
				else
					return 0;			
			}
			else

				return 0;

		}
		
		function verify_otp_delivery($otp,$cust_id)

		{
			
			$this->db->where("otp", $otp);
			$this->db->where("cust_id", $cust_id);
			$result = $this->db->getOne("customer");
			
			//ALTER TABLE `order_master` CHANGE `status` `status` ENUM('1','2','3','4') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '1' COMMENT '1-active,2-deactive,3-cancel,4-delivered';
			
			return $result;
		}
		
		function check_order_status($order_id)
		{
			return $this->db->rawQueryone("select status from tracking where order_id = '".$order_id."' order by status DESC limit 1");
		}
		
		function get_all_scheduled_orders()

		{

			//global $db; get all details for mobile customer

			return $this->db->rawQuery("select *, b.brand_name, m.model_name, o.status as order_status, o.order_number as order_number, c.full_name, (select status from tracking where order_id = order_number order by status DESC limit 1) as track_status from customer c left join order_master as o on c.cust_id = o.cust_id left join brand as b on b.brand_id = o.brand_id left join model as m on m.model_id = o.model where c.status = '1' ORDER BY o.ord_id DESC");

		}
		
		function check_invoice($ord_id)

		{

			$result = $this->db->rawQueryOne("select * from invoice where ord_id = '".$ord_id."'");
			return $result;

		}
		
		

	}

	

?>
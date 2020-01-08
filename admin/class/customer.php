<?php

// class for schedule 	
class Customer
{
	public $db;
	
	//constructor
	public function __construct($db_conn)
	{
		//constructor 
		$this->db = $db_conn;
	}		
	
	/* Member functions */
	function userotp($data)
	{
						
		if($this->db->insert('customer',$data))
			return 1;			
		else
			return 0;
	}
	
	function getuser_details($mobile)
	{
		return $this->db->rawQuery("select * from customer where mobile_number = '".$mobile."'");		
	}	

	
	function updateotpusers($mobile_number,$data)
		{
			
			$this->db->where('mobile_number',$mobile_number);
			if($this->db->update('customer',$data))
				return 1;			
			else
				return 0;
		}
	/* Member functions */
	// function getSchedule($id)
	// {
		
		// $result = $this->db->rawQueryOne("select * from schedule where schedule_id = '".$id."'");
		// return $result; 
	// }

	// function deleteSchedule($id,$data)
	// {
		
			// $this->db->where('schedule_id',$id);
			// if($this->db->update('schedule',$data))	
				// return 1;
			// else
				// return 0;
	// }
	
	// function updateSchedule($id,$data)
	// {
		
		// $this->db->where('schedule_id',$id);
		// if($this->db->update('schedule',$data))
			// return 1;
		// else
			// return 0;
	// }
	
	// function getallcate()
	// {
			
			// $result = $this->db->rawQuery("select * from brand where isDeleted='0'");
			// return $result; 
	// }
}	

?>
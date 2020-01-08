<?php
	// class for doctor
	class Mobile_repair_class 
	{
		public $db;
	
	//constructor
	public function __construct($db_conn)
	{
		//constructor 
		$this->db = $db_conn;
	}		
		
	/* Member functions */
		function getAllcategory()
		{
			
			return $this->db->rawQuery("select * from brand where isDeleted='0' order by brand_id DESC");
		}	
		
		/*  Add  Category */
		function addcate($data)
		{
						
			if($this->db->insert('brand',$data))
				return 1;			
			else
				return 0;
		}

		function activeDeactive($id,$data)
		{
		
		$this->db->where('brand_id',$id);
		if($db->update('brand',$data))	
		return 1;
		else
		return 0;
		}
		
		// function deletecate($id,$data)
		// {
			
			// $this->db->('brand_id',$id);
			// if($db->update('brand',$data))	
				// return 1;
			// else
				// return 0;
		// }
		
		/* Member functions */
		function getcate($id)
		{
			
			return $this->db->rawQueryOne("select * from brand  where brand_id = '".$id."'");
			
			
			
		}
		
	}	
?>
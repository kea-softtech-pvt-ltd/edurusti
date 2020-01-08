<?php

    //class for logo
    class Logo
	{
		public $db;
		//constructor
		public function __construct($_db)
		{
			$this->db = $_db;
			//constructor 
		}
		
		/* Member functions */
		function getAllLogo()
		{
			//global $db;
			return $this->db->rawQuery("select * from banner where status='1'");
		}	
		
		/* Member functions */
		function getLogo($id)
		{
			//global $db;
			$result = $this->db->rawQueryOne("select * from banner where banner_id = '".$id."'");
			return $result; 
		}
		
		function deleteLogo($id,$data)
		{
			//global $db;
			$this->db->where('banner_id',$id);
			if($this->db->update('banner',$data))	
				return 1;
			else
				return 0;
		}
		
		function updateLogo($id,$data)
		{
			//global $db;		
			$this->db->where('banner_id',$id);
			if($this->db->update('banner',$data))
				return 1;			
			else
				return 0;
		}
		
		function addLogo($data)
		{
			//global $db;
			if($this->db->insert('banner',$data))
				return 1;
			else
				return 0;
		}
		
	}
	
?>
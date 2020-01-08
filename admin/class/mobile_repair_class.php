<?php
	// class for doctor
	class Mobile_repair_class 
	{
		//constructor
		public function __construct()
		{
			//constructor 
		}		
		function model_exit_update($model_name,$brand_id)
		{
			global $db;
			$result = $db->rawQueryOne("select count(*) as total_count from brand where isDeleted='0' and brand_name='".$model_name."' and brand_id !='".$brand_id."'");
			return $result; 
		}
	   /* Member functions */
		function model_exit($model_name)
		{
			global $db;
			$result = $db->rawQueryOne("select count(*) as total_count from brand where isDeleted='0' and brand_name='".$model_name."'");
			return $result; 
		}	
		/* Member functions */
		function getAllcategory()
		{
			global $db;
			return $db->rawQuery("select * from brand where isDeleted='0' order by brand_id DESC");
		}	
		
		/*  Add  Category */
		function addcate($data)
		{
			global $db;				
			if($db->insert('brand',$data))
				return 1;			
			else
				return 0;
		}
		
		function add_subadmin($data)
		{
			global $db;	
			$db->where("mobile", $data['mobile']);
			$result = $db->getOne("admin");
			if(empty($result['mobile'])){
				if($db->insert('admin',$data))
					return 1;			
				else
					return 0;
			}
			else
				return 0;
		}
		
		function save_invoice($data)
		{
			global $db;	
			$db->where("ord_id", $data['ord_id']);
			$result = $db->getOne("invoice");
			if(empty($result['ord_id']))
			{			
				if($db->insert('invoice',$data))
					return 1;			
				else
					return 0;
			}
			else
			{
				$db->where('ord_id',$data['ord_id']);
				if($db->update('invoice',$data))
					return 1;			
				else
					return 0;	
			}	
		}

		function activeDeactive($id,$data)
		{
		global $db;
		$db->where('brand_id',$id);
		if($db->update('brand',$data))	
		return 1;
		else
		return 0;
		}
		
		function deletecate($id,$data)
		{
			global $db;
			$db->where('brand_id',$id);
			if($db->update('brand',$data))	
				return 1;
			else
				return 0;
		}
		
		function delete_subadmin($id)
		{
			global $db;
			$db->where('admin_id', $id);
			if($db->delete('admin'))	
				return 1;
			else
				return 0;
		}
		
		function delete_feedback($id,$data)
		{
			global $db;
			$db->where('feedback_id',$id);
			if($db->update('feedback',$data))	
				return 1;
			else
				return 0;
		}
		
		function active_deactive_feedback($id,$data)
		{
			global $db;
			$db->where('feedback_id',$id);
			if($db->update('feedback',$data))	
				return 1;
			else
				return 0;
		}
		
		function updatecate($id,$data)
		{
			global $db;
			$db->where('brand_id',$id);
			if($db->update('brand',$data))	
				return 1;
			else
				return 0;
		}
		
		/* Member functions */
		function getcate($id)
		{
			global $db;
			$result = $db->rawQueryOne("select * from brand  where brand_id = '".$id."'");
			return $result; 
		}
		
		
		
	}	
?>
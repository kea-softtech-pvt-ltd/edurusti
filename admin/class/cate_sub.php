<?php

// class for schedule 	
class cate_sub
{
	public $db;
	
	//constructor
	public function __construct($db_conn)
	{
		//constructor 
		$this->db = $db_conn;
	}	
    function model_exit_edit($model_name,$id)
	{
			global $db;
			$result = $db->rawQueryOne("select count(*) as total_count from model where isDeleted='0' and model_name='".$model_name."' and model_id !='".$id."'");
			return $result; 
	}		
	function model_exit($model_name,$brand_id)
	{
			global $db;
			$result = $db->rawQueryOne("select count(*) as total_count from model where isDeleted='0' and model_name='".$model_name."' and brand_id = '".$brand_id."'");
			return $result; 
	}	
	/* Member functions */
	function addcate_sub($data)
	{
						
		if($this->db->insert('model',$data))
			return 1;			
		else
			return 0;
	}
	
	function getAllcate_sub()
	{
		return $this->db->rawQuery("SELECT model.brand_id,model.model_name,model.model_id, brand.brand_name FROM model INNER JOIN brand ON model.brand_id = brand.brand_id  where model.isDeleted='0' order by brand_id DESC");			
	}	

	/* Member functions */
	function get_module($id)
	{
		
		$result = $this->db->rawQueryOne("select * from model where model_id = '".$id."'");
		return $result; 
	}

	function delete_module($id,$data)
	{
		
			$this->db->where('model_id',$id);
			if($this->db->update('model',$data))	
				return 1;
			else
				return 0;
	}
	
	function update_module($id,$data)
	{
		
		$this->db->where('model_id',$id);
		if($this->db->update('model',$data))
			return 1;
		else
			return 0;
	}
	
	function getallcate()
	{
			
			$result = $this->db->rawQuery("select * from brand where isDeleted='0'");
			return $result; 
	}
}	

?>
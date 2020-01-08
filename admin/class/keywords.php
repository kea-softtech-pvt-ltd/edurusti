<?php

// class for department 	
class keywords 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}

	function add_keywords($data,$title)
	{
		global $db;	
		$result = $db->rawQueryOne("select count(*) as total_count from keywords where keywords = '".$title."'");
		if($result['total_count'] > 0)
		{		
			return 2;
		}
		else
		{	
			if($db->insert('keywords',$data))
				return 1;			
			else
				return 0;
		}
	}
	
	/* Member functions */
	function getall_keywords_list()
	{
		global $db;
		return $db->rawQuery("select * from keywords order by keywords_id DESC");
	}	

	/* Member functions */
/* 	function getDepartment($id)
	{
		global $db;
		$result = $db->rawQueryOne("select * from department where dept_id = '".$id."'");
		return $result; 
	} */
    function get_issues($id)
		{
			global $db;
			$result = $db->rawQueryOne("select * from issues  where issues_id = '".$id."'");
			return $result; 
		}
	function delete_keywords($id)
	{
		global $db;
		$db->where('keywords_id', $id);
		if($db->delete('keywords'))	
			return 1;
		else
			return 0;
	}
	function update_db($id,$data)
	{
		global $db;
		$result = $db->rawQueryOne("select count(*) as total_count from issues where title='".$data['title']."' and issues_id != '".$id."'");
		if($result['total_count'] > 0)
		{		
			return 2;
		}
		else
		{
			$db->where('issues_id',$id);
			if($db->update('issues',$data))
				return 1;
			else
				return 0;
		}
	}
	function activeDeactive($id,$data)
	{
		global $db;
		$db->where('dept_id',$id);
		if($db->update('department',$data))	
			return 1;
		else
			return 0;
	}
	function change_status($id,$data)
	{
		global $db;
		$db->where('keywords_id',$id);
		if($db->update('keywords',$data))	
			return 1;
		else
			return 0;
	}
}	

?>
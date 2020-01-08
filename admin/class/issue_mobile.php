<?php

// class for department 	
class Issue_mobile 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}

	function addissue_mobile($data,$title)
	{
		global $db;	
		$result = $db->rawQueryOne("select count(*) as total_count from issues where title='".$title."'");
		if($result['total_count'] > 0)
		{		
			return 2;
		}
		else
		{	
			if($db->insert('issues',$data))
				return 1;			
			else
				return 0;
		}
	}
	
	/* Member functions */
	function getallissue_list()
	{
		global $db;
		return $db->rawQuery("select * from issues where status='1' order by issues_id DESC");
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
	function delete_issues($id,$data)
	{
		global $db;
			$db->where('issues_id',$id);
			if($db->update('issues',$data))	
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
}	

?>
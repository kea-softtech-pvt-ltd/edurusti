<?php
class Profile
{
	public $db;
	
	//constructor
	public function __construct($db_conn)
	{
		//constructor 
		$this->db = $db_conn;
	}function uodate_profile_db($id,$data)	{		$this->db->where('admin_id',$id);		if($this->db->update('admin',$data))			return 1;		else			return 0;	}	    function get_admin_detail($id)	{		$result = $this->db->rawQueryOne("select * from admin where admin_id = '".$id."'");		return $result; 	}
}	

?>
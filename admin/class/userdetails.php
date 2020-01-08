<?php
	// class for doctor
	class Userdetails 
	{
		
		public function __construct()
		{
			//constructor 
		}		
		
	
		
		/*  Add  Category */
		function userotp($data)
		{
			global $db;
			if($db->insert('users_details',$data))
				return 1;			
			else
				return 0;
		}
		
		function getuser_details ($user_mobile)
		{
			global $db;
			$result = $db->rawQueryOne("select * from users_details  where user_mobile = '".$user_mobile."'");
			return $result; 
		}
		function updateotpusers($user_mobile,$data)
		{
			global $db;
			$db->where('user_mobile',$user_mobile);
			if($db->update('users_details',$data))
				return 1;			
			else
				return 0;
		}
		
		
	}	
?>
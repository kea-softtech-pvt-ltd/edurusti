<?php

class Login 
{
	//constructor
	public function __construct()
	{
		//constructor 
	}
	
	function loginCheck($mobile, $password)
	{
		global $db;
		$data = $db->rawQuery("select * from admin where mobile='".$mobile."' and password='".md5($password)."' and is_active = '1'");
		return $data;
	}
}	
?>
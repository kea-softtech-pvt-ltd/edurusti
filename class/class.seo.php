<?php

// class for seo 	

class seo 

{

	public $db;
	private $Notification; 
	

	//constructor

	public function __construct($db_conn)

	{

		//constructor 

		$this->db = $db_conn;

	}			

	// get seo information 

	function get_seo_data()

	{			

		$this->db->where("is_active", '1');

		$result = $this->db->getOne("keywords");

		return $result; 

	}

}	



?>
<?php
include_once('../includes/application_top.php');

include_once('../class/class.customer.php');
$otpuser = new Customer($db);

include_once('../class/class.login.php');
$login = new Login($db);

if($_POST['action'] == "register_customer")
{
	$mobile = $_POST["mobile_number_register"];
	$row = $login->check_customer($mobile);
	if(empty($row['mobile_number']))
	{
		$rand = generate_otp();
		$register_data = array(	
						'full_name' => $_POST["full_name"],
						'mobile_number' => $_POST["mobile_number_register"],			
						'password' => sha1($_POST["password"].password_key),
						'otp' => $rand,
						);		
		if($login->register_customer($register_data))
		{
			$data['status'] = '1'; 
			//$data['otp'] = $rand; 
			$data['message'] = 'success'; 
		}
		else
		{
			$data['status'] = '0'; 
			$data['message'] = 'error'; 
		}
	}
	else
	{
		$data['status'] = '2'; 
		$data['message'] = 'already_exist'; 
	}
}

if($_POST['action'] == "check_login")
{	
	$mobile = $_POST["mobile_number"];
	$password = sha1($_POST["password"].password_key);
	
	$result = $login->check_login($mobile,$password);
	
	if(!empty($result))
	{
		$_SESSION['mobile_number'] = $result['mobile_number'];
		$_SESSION['cust_id'] = $result['cust_id'];
		
		$data['status'] = '1'; 
		$data['message'] = 'success'; 
	}
	else
	{
		$data['status'] = '0'; 
		$data['message'] = 'error'; 
	}
}

if($_POST['action'] == "otp")
{		
	$mobile = $_POST["mobile"];
	$row = $login->check_customer($mobile);
	$rand = generate_otp();
	
	if(!empty($row['mobile_number']))
	{
		$dataArr = Array(	
			'mobile_number' =>  $_POST["mobile"],
			'otp' => $rand,
			'is_verified' => "1",
			'updated_date' => date('Y-m-d h:i:s')
		);		
		
		$otp_update_result = $login->update_otp($row['mobile_number'], $dataArr);
		if($otp_update_result)
		{	
			$data['status'] = '1'; 
			$data['message'] = 'success'; 
			//$data['otp'] = $rand;
			$data['cust_id'] = $row['cust_id'];
		}
		else
		{
			$data['status'] = '0'; 
			$data['message'] = 'error'; 
		}    
	}
	else
	{		
		$data['status'] = '2'; 
		$data['message'] = 'error'; 
	}
} 

if($_POST['action'] == "register_customer_and_otp")
{		
	$mobile = $_POST["mobile"];
	$row = $login->check_customer($mobile);
	if(empty($row['mobile_number']))
	{
		$rand = generate_otp();
		$register_data = array(	
						'full_name' => $_POST["name"],
						'mobile_number' => $_POST["mobile"],			
						'address' => $_POST['address'],
						'otp' => $rand,
						);		
		if($login->register_customer($register_data))
		{
			$data['status'] = '1';
			$data['message'] = 'success'; 
		}
		else
		{
			$data['status'] = '0'; 
			$data['message'] = 'error'; 
		}
	}
	else
	{
		$rand = generate_otp();
		$dataArr = Array(	
			'mobile_number' =>  $_POST["mobile"],
			'otp' => $rand,
			'is_verified' => "1",
			'updated_date' => date('Y-m-d h:i:s')
		);		
		
		$otp_update_result = $login->update_otp($row['mobile_number'], $dataArr);
		if($otp_update_result)
		{	
			$data['status'] = '1'; 
			$data['message'] = 'success'; 
		}
		else
		{
			$data['status'] = '0'; 
			$data['message'] = 'error'; 
		}    
		
	}
}

if($_POST['action'] == "verify_otp")
{
	$mobile = $_POST['mobile'];
	$otp_numer =  $_POST['otp_numer'];
	$row_verify = $login->check_customer($mobile);
	if($row_verify['otp'] == $otp_numer)
	{
		if($_POST['type'] == 'register')
		{
			if($login->set_verified($mobile))
			{
				$_SESSION['mobile_number'] = $row_verify['mobile_number'];
				$_SESSION['cust_id'] = $row_verify['cust_id'];
			}
		}	
		$data['status'] = '1'; 
		$data['message'] = 'success'; 
	}
	else
	{
		$data['status'] = '0'; 
		$data['message'] = 'error'; 
	}
}	

if($_POST['action'] == "verify_otp_new")
{
	$mobile = $_POST['mobile'];
	$otp_numer =  $_POST['otp_numer'];
	$row_verify = $login->check_customer($mobile);
	if($row_verify['otp'] == $otp_numer)
	{		
		if($login->set_verified($mobile))
		{
			$_SESSION['mobile_number'] = $row_verify['mobile_number'];
			$_SESSION['cust_id'] = $row_verify['cust_id'];
		}
		$data['status'] = '1'; 
		$data['message'] = 'success'; 
	}
	else
	{
		$data['status'] = '0'; 
		$data['message'] = 'error'; 
	}
}

if($_POST['action'] == "reset_password")
{
	$cust_id = $_POST['cust_id'];
	$reset_password = sha1($_POST['reset_password'].password_key);
	
	$dataArr = array('password' => $reset_password);
	$result = $login->reset_password($dataArr,$cust_id);
	if(!empty($result))
	{
		$_SESSION['mobile_number'] = $result['mobile_number'];
		$_SESSION['cust_id'] = $cust_id;
		
		$data['status'] = '1'; 
		$data['message'] = 'success'; 
	}
	else
	{
		$data['status'] = '0'; 
		$data['message'] = 'error'; 
	}
}

echo json_encode($data); 

?>
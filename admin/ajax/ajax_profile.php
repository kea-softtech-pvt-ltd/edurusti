<?php 
include_once('../includes/application_top.php');
include_once('../class/profile_new.php');


//     'doctor_identity_proof', 'registration_proof', 'clinic_registration_proof', 'type', 'status', 'isVerified', 'created_date', 'updated_date', 'isDeleted;




$profile = new Profile($db);
// $id = $_SESSION['id'];

if($_REQUEST['action']=="update_profile")
{
	          $registration = Array(
				'full_name' => $_REQUEST['fname'], 
				'mobile' => $_REQUEST['mobile']
				);

	if($profile->uodate_profile_db($_SESSION['admin_id'],$registration))
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}



?>
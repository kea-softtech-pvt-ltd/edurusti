<?php 
include_once('../includes/application_top.php');
include_once('../class/mobile_repair_class.php');
$doc  = new Mobile_repair_class();

	if($_REQUEST['action']=="model_exit")
	{
		global $db;
		$varrow=$doc->model_exit($_REQUEST['cate_name']);
		echo $varrow['total_count'];
	}
else if($_REQUEST['action']=="add_cate")
{
	$data = Array(	
		'brand_name' =>  $_REQUEST['cate_name'],
		'created_date' => date('Y-m-d h:i:s')
		);
	$mobile_repair_insert_result = $doc->addcate($data);
	if($mobile_repair_insert_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}else if($_REQUEST['action']=="add_subadmin")
{
	$data = Array(	
		'full_name' =>  $_REQUEST['full_name'],
		'mobile' =>  $_REQUEST['mobile_number'],
		'password' =>  md5($_REQUEST['password']),
		'role' =>  '2',
		'is_active' =>  '1'
	);
	$mobile_repair_insert_result = $doc->add_subadmin($data);
	if($mobile_repair_insert_result)
	{		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}else if($_REQUEST['action']=="active_deactive_cate")
{	
	
	$id = $_POST['id'];
	$row = $doc->getcate($id); 	
	if($row['status']=='1')
	{
	$data = array('status' => '0');
	}
	else
	{
		$data = array('status' => '1');
	}
	$result = $doc->deletecate($id,$data);
	if($result)
	{
		echo "success";
	}

}else if($_REQUEST['action']=="delete_cate")
{
	$id = $_POST['id'];
	$data = array('isDeleted' => '1');			
	$result = $doc->deletecate($id,$data);
	if($result)
	{
		echo "success";
	}	
}
else if($_REQUEST['action']=="delete_subadmin")
{
	$id = $_POST['admin_id'];
	$result = $doc->delete_subadmin($id);
	if($result)
	{
		echo "success";
	}	
}
else if($_REQUEST['action']=="delete_feedback")
{
	$id = $_POST['id'];
	$data = array('status' => '2');			
	$result = $doc->delete_feedback($id,$data);
	if($result)
	{
		echo "success";
	}	
}
else if($_REQUEST['action']=="active_deactive_feedback")
{	
	
	$id = $_POST['id'];
	$data = array('status' => $_POST['feedback_status']);
	$result = $doc->active_deactive_feedback($id,$data);
	if($result)
	{
		echo "success";
	}

}
elseif($_REQUEST['action']=="model_exit_update")
{
		global $db;
		$varrow=$doc->model_exit_update($_REQUEST['cate_name'],$_REQUEST['brand_id']);
		echo $varrow['total_count'];
}
else if($_REQUEST['action']=="update_cate")
{	
	$id = $_POST['id'];
	$row = $doc->getcate($id);
	
		?>
		 <form method="post" id="brand" name="brand" enctype="multipart/form-data" class="col-sm-12">
					<!--code for image update only-->
						<div class="form-group">				
						<input type="hidden" id="isImageChange" name="isImageChange" value="0">
						</div>
						<div class="form-group">				
							<input type="hidden" class="form-control" id="brand_id" name="brand_id" value="<?php echo $row['brand_id'];?>" required>
						</div>
						<div class="form-group">		
							<label>brand Name</label>
							<input type="text" class="form-control" id="cate_name" name="cate_name" value="<?php echo $row['brand_name'];?>" required>
							<div id="cate_name_error" style="color:#FF0000"></div>
						</div>
						<tr>
				<td colspan="2">
					<input type="button" onclick="validateForm_update_model();"  name="submit" class="btn btn-primary" value="save"/>
				</td>
			  </tr>
         </form>
  
 <?php
}
else if($_REQUEST['action']=="update_cate_insert")
{
	//$track_id = $_REQUEST['track_id'];
	$data = Array(
		'brand_name' =>  $_REQUEST['cate_name']
	);

	
	$id = $_REQUEST['id'];			
	$result = $doc->updatecate($id,$data);
	if($result)
	{
		echo "success";
	}	
}
else if($_REQUEST['action']=="save_invoice")
{
	$data = Array(
		'ord_id' =>  $_REQUEST['ord_id'],
		'html' =>  $_REQUEST['_html']
	);
	
	$result = $doc->save_invoice($data);
	if($result)
	{
		echo "success";
	}	
}
 ?>


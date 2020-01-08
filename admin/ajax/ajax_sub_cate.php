<?php
include_once('../includes/application_top.php');
include_once('../class/cate_sub.php');

$add_sub_cate = new Cate_sub($db);

if($_REQUEST['action']=="model_exit")
	{
		global $db;
		$varrow=$add_sub_cate->model_exit($_REQUEST['sub_cate_name'],$_REQUEST['brand_id']);
		if($varrow['total_count'] > 0)
			echo '1';
		else
			echo '0';
	}
else if($_REQUEST['action']=="_addcate_sub")	
{
	
	$data = Array(
	'brand_id' =>  $_REQUEST['cate_add'],
	'model_name' =>  $_REQUEST['add_cate_sub']
	);
	
	$result = $add_sub_cate->addcate_sub($data);

	if ($result)
	{
		echo "success";	
	}
	else
	{
		echo "error";
	}
	
	
	
}
if($_REQUEST['action']=="model_exit_edit")
	{
		global $db;
		$varrow=$add_sub_cate->model_exit_edit($_REQUEST['sub_cate_name'],$_REQUEST['sub_category_id'],$_REQUEST['brand_id']);
		if($varrow['total_count'] > 0)
			echo '1';
		else
			echo '0';
	}
else if($_REQUEST['action']=="edit_model")
{
	$id = $_POST['id'];
	$row = $add_sub_cate->get_module($id);
?>
	<div class="form-group">				
		<input type="hidden"  id="sub_category_id" name="sub_category_id" value="<?php echo $id;?>">
	</div>
	<form class="col-sm-6" name="sub_cate_data_update" id="sub_cate_data_update">
                                            <div class="form-group">
											<?php 
											$category =$add_sub_cate->getallcate();
											 $num = count($category);
											?>
                                        <label>Brand Name</label>
										 <select class="form-control" name="cate_add" id="cate_add">
										 <option value="">Select Brand Name</option>			
                                             <?php 	
											      for($i=0;$i<$num;$i++)
												  {
														?>
															<option value="<?php echo $category[$i]['brand_id'];?>" <?php if($category[$i]['brand_id']==$row['brand_id']) echo "selected"; ?>>
															<?php echo $category[$i]['brand_name']; ?>
															</option>
														<?php 
													
												  }
											?>
											</select>
											
											<div id="cate_add_error" style="color:#FF0000">
										</div>																																		
                                           <div class="form-group">
                                                <label>  Model Name</label>
                                                <input type="text" class="form-control" name="add_cate_sub" id="add_cate_sub" value="<?php echo $row['model_name'];?>" placeholder="Enter Model Name" required>
												<div id="cate_sub_error" style="color:#FF0000">
												</div>
											</div>   
                                            
                                          <div class="reset-button">
                                               <input type="reset" class="btn btn-warning"/>
                                             <input onclick="validateForm_update();" type="button" name="submit" class="btn btn-primary" value="Save"/>
                                         </div>                                         
                                     </form>
	
<?php 
}
else if($_REQUEST['action']=="update_sub_category")
{
	$id = $_POST['sub_category_id'];
	$data = Array(
	'brand_id' =>  $_REQUEST['cate_add'],
	'model_name' =>  $_REQUEST['add_cate_sub']
	);
	$result = $add_sub_cate->update_module($id,$data);
	if($result)
	{
		echo"success";
	}
}
else if($_REQUEST['action']=="delete_model")
{
//delete_module
    $id = $_POST['id'];
	$data = array('isDeleted' =>'1');
	$result = $add_sub_cate->delete_module($id,$data);
	if($result)
	{
		echo"success";
	}
}

?>
<?php 
include_once('../includes/application_top.php');
include_once('../class/keywords.php');
$keywords = new keywords();


if($_REQUEST['action']=="add_keywords")
{

	$data = Array(
		'keywords' =>  $_REQUEST['keywords_name'],
		'keywords_description' => $_REQUEST['keywords_desc'],
		'is_active' => '1',
		'created_date' => $_TODAY
	);
	$result = $keywords->add_keywords($data,$_REQUEST['keywords_name']);
	if($result=='2')
	{
		echo "exit";
	}
	else if($result=='1')
	{
		echo "success";
	}
	else
	{
		echo "error";
	}
}




else if($_REQUEST['action']=="edit_issues")
{	
	$id = $_POST['id'];
	$row = $keywords->get_issues($id); 

	?>
	<div class="form-group">				
		<input type="hidden"  id="issues_id" name="issues_id" value="<?php echo $id;?>">
	</div>
			<form class="col-sm-6" name="issue-description-data" id="issue-description-data">
			<div class="form-group">
			<label>Issue</label>
			<textarea class="form-control" id="issue_desc" name="issue_desc" rows="3"><?php echo $row['title']; ?></textarea>
			<div id="issue_desc_error_update" style="color:#FF0000;display:none;">Issue name already exist.</div>

			</div>
			<input type="hidden" name="price" id="price" class="form-control" placeholder="Enter Price" value="0"/>
			<!--div class="form-group">
			<label>Price</label>
			<input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" value="<?php echo $row['description']; ?>"/>
			<div id="price_error" style="color:#FF0000">
			</div>
			</div-->
			<div class="reset-button">
			<input type="reset" class="btn btn-warning"/>
			<input onclick="update_issues();" type="button" name="submit" class="btn btn-primary" value="Save"/>
			</div>
			</form>
<?php
 
	
}
else if($_REQUEST['action']=="update_issues")
{
	$id = $_POST['id'];
	$data = Array(
		'title' =>  $_REQUEST['issue_desc'],
		'description' => $_REQUEST['price']
	);
	$result = $keywords->update_db($id,$data);
	if($result=='2')
	{
		echo "exit";
	}
	else if($result=='1')
	{
		echo "success";
	}
	else
	{
		echo "error";
	}	
	
}
else if($_REQUEST['action']=="delete_keywords")
{
	//delete_module
    $id = $_POST['id'];
	$result = $keywords->delete_keywords($id);
	if($result)
	{
		echo"success";
	}
}	
else if($_REQUEST['action']=="change_status")
{
	//delete_module
    $id = $_POST['id'];
	$data = Array(
		'is_active' => $_REQUEST['is_active']
	);
	$result = $keywords->change_status($id,$data);
	if($result)
	{
		echo"success";
	}
}



?>
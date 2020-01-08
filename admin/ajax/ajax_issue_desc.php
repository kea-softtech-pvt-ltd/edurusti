<?php 
include_once('../includes/application_top.php');
include_once('../class/issue_mobile.php');
$issue = new Issue_mobile();


if($_REQUEST['action']=="issue_description")
{

	$data = Array(
		'title' =>  $_REQUEST['issue_desc'],
		'description' => $_REQUEST['price']
	);
	$result = $issue->addissue_mobile($data,$_REQUEST['issue_desc']);
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
	$row = $issue->get_issues($id); 

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
	$result = $issue->update_db($id,$data);
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
else if($_REQUEST['action']=="delete_issues")
{
//delete_module
    $id = $_POST['id'];
	$data = array('status' =>'3');
	$result = $issue->delete_issues($id,$data);
	if($result)
	{
		echo"success";
	}
}	

?>
<?php
include_once('../includes/application_top.php');
include_once('../class/repair.php');
$Repairs = new Repair($db);
if($_REQUEST['action']=="view_logo")
{
	$id = $_POST['id'];
	$row = $Repairs->getCustomer($id);
?>
	
	<div class="table-responsive">
  <table class="table">
    <thead>
    
	  <tr>
	   <tr>
        <th scope="col">Full name</th>
        <td scope="col"><?php echo $row['full_name'];?></td>
      </tr>
	  <tr>
        <th scope="col">Email</th>
        <td scope="col"><?php echo $row['email'];?></td>
      </tr>
	  <tr>
        <th scope="col">Mobile No</th>
        <td scope="col"><?php echo $row['mobile_number'];?></td>
      </tr>
	  <tr>
        <th scope="col">Pin Code</th>
        <td scope="col"><?php echo $row['pin_code'];?></td>
      </tr>
	  <tr>
        <th scope="col">Address 1</th>
        <td scope="col"><?php echo $row['address'];?></td>
      </tr>
	  <tr>
        <th scope="col">Address 2</th>
        <td scope="col"><?php echo $row['address1'];?></td>
      </tr>
	  <tr>
        <th scope="col">Landmark</th>
        <td scope="col"><?php echo $row['landmark'];?></td>
      </tr>
	  <tr>
        <th scope="col">City</th>
        <td scope="col"><?php echo $row['city'];?></td>
      </tr>
	  
    </thead>
    <!--tbody>
      <tr>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
        <td>Cell</td>
      </tr>
    </tbody-->
  </table>
</div>
	                       
<?php 
}
else if($_REQUEST['action']=="edit_")
{
   ?>
  
	<form method="post" id="track_form" name="track_form" enctype="multipart/form-data" class="col-sm-12">
	 <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $_REQUEST['id']; ?>">
   <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']; ?>">
	  <div class="form-group">
		<label for="exampleInputEmail1">Track status</label>
		<select class="form-control" id="track" name="track">
        <option value="1">pickup</option>
        <option value="2">in process</option>
        <option value="3">repaired</option>
        <option value="4">shipped</option> 
		<option value="5">Delivery </option>
      </select>
	  </div>
	    <input onclick="track_form_val();" type="button" name="submit" class="btn btn-primary" value="submit"/>
	</form>
   <?php
}
else if($_REQUEST['action']=="add_track")
{
	
	//$track_id = $_REQUEST['track_id'];
	$data = Array(
		'order_id' =>  $_REQUEST['order_id'],
		'cust_id' =>  $_REQUEST['cust_id'],
		'status' =>  $_REQUEST['track'],
		'created_date' => date('Y-m-d h:i:s')
	);

	
	$logo_update_result = $Repairs->add_track($data);
	if($logo_update_result)
	{
		
		echo "success";
	}
	else
	{
		echo "error occured";
	}
		
}
?>
<?php

include_once('../includes/application_top.php');

include_once('../class/repair.php');

$Repairs = new Repair($db);

if($_REQUEST['action']=="view_logo")

{

	$id = $_POST['id'];

	$row = $Repairs->getrepair($id);

	//print_r($row);

?>

	<!--div class="form-group">		

		<label>cate_name:</label>

		<span id="cate_name" name="cate_name"><?php echo $row['cate_name'];?></span>

	</div>

	<div class="form-group">		

		<label>cate_sub:</label>

		<span id="cate_sub" name="cate_sub"><?php echo $row['cate_sub'];?></span>

	</div-->

	<div class="table-responsive">

  <table class="table">

    <thead>

     <tr>

        <th scope="col">Order number</th>

        <td scope="col"><?php echo $row['order_number'];?></td>

	</tr>

	<tr>

        <th scope="col">Brand name</th>

        <td scope="col"><?php echo $row['brand_name'];?></td>

	</tr>

	 <tr>

        <th scope="col">Modal name</th>

        <td scope="col"><?php  if($row['model_name']) { echo $row['model_name'];} else { echo $row['other_model'];}?></td>

      </tr> 

	  <!--tr>

        <th scope="col">Description</th>

        <td scope="col"><?php echo $row['order_description'];?></td>

      </tr-->

	  <tr>

        <th scope="col">Pick-up date time</th>

        <td scope="col"><?php echo $row['pickup_date_time'];?></td>

      </tr>

	  <tr>

	  <?php

		$Repair_mob = $Repairs->get_repair_issues($row['issues_id']);

		$num = count($Repair_mob);

		//print_r($Repair_mob);

	  ?>

        <th scope="col" > Issues</th>

		<td scope="col" colspan="<?php echo $num;?>">

			<?php

			$j=1;

			for($i=0;$i<$num;$i++)

			{

				?>

				<?php 

				 echo $j.")".$Repair_mob[$i]['title'];

				  $j++;

				?><br/>

				<?php

			}

			?>

			</td>

      </tr>

	   <!--tr>

        <th scope="col" > Issues Description</th>

		<td scope="col"><?php echo $row['issues_description'];?></td>

      </tr-->

	   <tr>

        <th scope="col">Full name</th>

        <td scope="col"><?php echo $row['full_name'];?></td>

      </tr>

	  <!--tr>

        <th scope="col">Email</th>

        <td scope="col"><?php echo $row['email'];?></td>

      </tr-->

	  <tr>

        <th scope="col">Mobile number</th>

        <td scope="col"><?php echo $row['mobile_number'];?></td>

      </tr>

	  <!--tr>

        <th scope="col">Pin Code</th>

        <td scope="col"><?php echo $row['pin_code'];?></td>

      </tr-->

	  <tr>

        <th scope="col">Address</th>

        <td scope="col"><?php echo $row['address'];?></td>

      </tr>

	  <!--tr>

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

      </tr-->

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
	$array = array('Scheduled','Picked-up','In-process','Repaired','Shipped');//,'Delivery'
	$Repair_mob = $Repairs->Repair_status($_REQUEST['order_id']);
	//print_r($Repair_mob);
	
	
	if($Repair_mob['order_status'] == '3')
	{
		echo "<center><b>Order Cancelled.</b></center>";
	}
	else if($Repair_mob['track_status'] == '6')
	{
		echo "<center><b>Order delivered successfully.</b></center>";
	}
	else
	{	
	?>

	<form method="post" id="track_form" name="track_form" enctype="multipart/form-data" class="col-sm-12">

	 <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $_REQUEST['id']; ?>">
	 <input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']; ?>">

	<input type="hidden" name="track_status" id="track_status" value="<?php echo $Repair_mob['track_status']; ?>">

		<div class="form-group">

			<label for="exampleInputEmail1">Track status</label>

			<select class="form-control" id="track" name="track">
			<?php
			$i = 1;
			foreach($array as $v)
			{
				if($Repair_mob['track_status'] < $i)
				{
					?>
					<option value="<?php echo $i; ?>"><?php echo $v; ?></option>
					<?php
				}
				$i++;
			}
			?>	
			</select>

		</div>
		
		<div class="form-group">

			<label for="exampleInputEmail1">Track Status Description</label>

			<textarea class="form-control" rows="3" id="track_description" name="track_description" placeholder="Track Status Description"></textarea>

		</div>
		
		

	    <input onclick="track_form_val();" type="button" name="submit" class="btn btn-primary" value="submit"/>
		
		<a href="javascript:void(0);" onclick="$('#track_form').hide();$('#order_cancel').show();" class="btn btn-default">Cancel Order</a>

	</form>
	
	<form name="order_cancel" id="order_cancel" method="POST" style="display:none;">
		<div class="form-group">
			<input type="hidden" name="order_id_concel" id="order_id_concel" value="<?php echo $_REQUEST['order_id']; ?>">
			<label>Cancel Order Description</label>
			<textarea class="form-control" placeholder="Cancel Order Description" id="description" name="description" rows="3" autocomplete="off"></textarea>
			<div id="description_error" style="color:#FF0000;display:none;">Description can not be empty.</div>
		</div>
		  <div>
		  <input onclick="cancel_validateForm();" type="button" name="submit" class="btn btn-primary" value="Cancel Order">
		  <a href="javascript:void(0);" onclick="$('#track_form').show();$('#order_cancel').hide();" class="btn btn-default">Change Status</a>
	   </div>
   </form>
	
	

   <?php
	}

}

else if($_REQUEST['action']=="generateOTP")

{
	$otp = generate_otp();
	
	$dataOTP = Array(

		'otp' =>  $otp

	);
	
	$Repair_mob = $Repairs->generate_otp_delivery($_REQUEST['id'],$dataOTP);
	?>	
	<form name="verify_otp_delivery_form" class="default-form" action="" method="post" style="">
	
		<h3>Verify Order</h3>

		(Enter OTP, which is sent on owner's mobile number)
		<div class="input-group" style="margin-top:10px;margin-bottom:10px;">
			<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
			<input type="text" name="otp_number" id="otp_number" maxlength="6" value="" class="form-control" autocomplete="off" placeholder="Enter OTP" required="">
		</div>

		<span id="error_otp_numer" class="error" style="display:none;color:red;">Please enter OTP.</span>

		<span id="invalid_otp_numer" class="error" style="display:none;color:red;"></span>

		<span class="error error2" style="display: none">* Input digits (0 - 9)</span>
		
		<div class="m-t-20">
			<button type="button" class="btn btn-primary pull-right" style="clear: both;" onclick="verify_otp_delivery();">Verify</button>
			<!--span><a href="javascript:void(0);" onclick="resend_otp();">Resend OTP</a></span-->
		</div>
		
		<input type="hidden" name="cust_id" id="cust_id" value="<?php echo $_REQUEST['id']; ?>">
		<input type="hidden" name="order_id" id="order_id" value="<?php echo $_REQUEST['order_id']; ?>">
		<input type="hidden" name="status_type" id="status_type" value="<?php echo $_REQUEST['status_type']; ?>">
		
	</form>

   <?php

}

else if($_REQUEST['action']=="verify_otp_delivery")

{

	$logo_update_result = $Repairs->verify_otp_delivery($_REQUEST['otp_number'],$_REQUEST['cust_id']);
	
	if(!empty($logo_update_result))

	{
		$dataNew = Array(

			'order_id' =>  $_REQUEST['order_id'],

			'cust_id' =>  $_REQUEST['cust_id'],
			
			'description' =>  '',

			'status' =>  $_REQUEST['status_type'],

			'created_date' => date('Y-m-d h:i:s')

		);

		if($Repairs->add_track($dataNew,($_REQUEST['status_type']-1)))
			echo "success";
		else
			echo "error occurred";

	}

	else

	{

		echo "error occurred";

	}

		

}

else if($_REQUEST['action']=="add_track")

{

	

	//$track_id = $_REQUEST['track_id'];

	$data = Array(

		'order_id' =>  $_REQUEST['order_id'],

		'cust_id' =>  $_REQUEST['cust_id'],
		
		'description' =>  $_REQUEST['track_description'],

		'status' =>  $_REQUEST['track'],

		'created_date' => date('Y-m-d h:i:s')

	);


	$logo_update_result = $Repairs->add_track($data,$_REQUEST['track_status']);

	if($logo_update_result)

	{

		

		echo "success";

	}

	else

	{

		echo "error occured";

	}

		

}
else if($_REQUEST['action']=="cancel_order")
{
	$data = Array(
		'order_description' =>  $_REQUEST['description'],
		'status' =>  '3'
	);
	$order_cancel_result = $Repairs->order_cancel($data,$_REQUEST['order_id_concel']);
	if($order_cancel_result)
	{
		echo "success";
	}
	else
	{
		echo "error occured";
	}
}

?>
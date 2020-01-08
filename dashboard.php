<?php
include_once("header.php");
include_once("login_check.php");
include_once('class/class.customer.php');
$customer = new Customer($db);
$data = $customer->getCustomerInformation($_SESSION['cust_id']);
?>
<!--Page Title-->
<section class="page-title">
	<div class="auto-container">
		<div class="content-box">
			<div class="title">My Account</div>
			<ul class="bread-crumb">
				<li><a href="/">Home<i class="fa fa-angle-right"></i></a></li>
				<li>Personal Information</li>
			</ul>
		</div>
	</div>
</section>
<!--End Page Title-->

<!-- service section -->
<section class="sidebar-page-container">
	<div class="container">
		<div class="row">
			<div class="content-side col-md-3 col-sm-6 col-xs-12">
				<?php include_once('sidebar_menu.php'); ?>
			</div>
			<div class="content-side col-md-9 col-sm-12 col-xs-12 user-right">
				<div class="service-detail contact-area">
				   <div class="service-detail-content">
						<div class="title">Personal Information</div>
						<div class="alert alert-danger" id="error_message" style="display:none;">Error occurred while updating information, Please try again</div>
						<form id="personal-info" onsubmit="return setPersonalInformation();" name="contact_form" method="post">
							<div class="row">
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">Full Name</label>
										<input type="text" class="form-control" id="full_name" maxlength="100" placeholder="Enter Full Name" name="full_name" value="<?php echo $data['full_name'];?>" required>
									</div>
								</div>
								<!--div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $data['email'];?>" required>
									</div>
								</div-->	
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">Mobile Number</label>
										<input type="text" disabled style="background: #fff;" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number" value="<?php echo $data['mobile_number'];?>">
									</div>
								</div>
								<!--div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">Pin-code</label>
										<input type="text" class="form-control" maxlength="6" id="pin_code" placeholder="Enter Pincode" name="pin_code" value="<?php if($data['pin_code'] > 0) echo $data['pin_code'];?>" required>
									</div>
								</div-->
								<div class="form-group col-sm-6">
									<label class="control-label">Address</label>
									<textarea required="required" class="form-control" name="address"  id="address" placeholder="Enter your address"><?php echo $data['address'];?></textarea>
								</div>
								<!--div class="form-group col-sm-6">
									<label class="control-label">Address 1</label>
									<textarea required="required" class="form-control" name="address1"  id="address1" placeholder="Enter your address1"><?php echo $data['address1'];?></textarea>
								</div>								
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">Landmark</label>
										<input type="text" class="form-control" id="landmark" placeholder="Enter Landmark" name="landmark"  value="<?php echo $data['landmark'];?>" required>
									</div>
								</div>	
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div class="form-group">
										<label for="email">City</label>
										<input type="text" class="form-control" id="city" placeholder="Enter City" name="city"  value="<?php echo $data['city'];?>" required>
									</div>
								</div-->			
							</div>
							<input type="hidden" name="action" value="setPersonalInformation">
							<button type="submit" class="btn btn-primary pull-right">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- service section end -->
<?php include_once('footer.php'); ?>

<script>
function setPersonalInformation()
{
	$('#error_message').hide();
	formData = $('#personal-info').serialize();
	$.ajax({
		type: "POST",
		url: "ajax/ajax.customer.php",				
		data: formData,
		success: function(response){
			var data_obj = JSON.parse(response);
			if(data_obj.message == 'success')
				window.location = 'placeorder.php';
			else
				$('#error_message').show();
		}
	});
	return false;
}
</script>
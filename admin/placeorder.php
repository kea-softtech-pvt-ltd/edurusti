<?php

include_once("header.php");

include_once("login_check.php");

include_once('class/class.customer.php');

$customer = new Customer($db);

$data = $customer->getCustomerInformation($_SESSION['cust_id']);

?>

	<link rel="stylesheet" href="css/jquery.steps.css">   

    <!--Page Title-->

    <section class="page-title">

        <div class="auto-container">

            <div class="content-box">

                <div class="title">My Account</div>

                <ul class="bread-crumb">

                    <li><a href="/">Home<i class="fa fa-angle-right"></i></a></li>

                    <li>Place Order</li>

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

							<div class="title">Place Order</div>

							<div id="placeOrder">

								<div class="stepwizard col-md-offset-1">

									<div class="stepwizard-row setup-panel">

										<div class="stepwizard-step">

											<a href="#step-1" type="button" id="circle-1" class="not-active btn btn-primary btn-circle">1</a>

											<p>Step 1</p>

										</div>

										<div class="stepwizard-step">

											<a href="#step-2" type="button" id="circle-2" class="not-active btn btn-default btn-circle" disabled="disabled">2</a>

											<p>Step 2</p>

										</div>

										<div class="stepwizard-step">

											<a href="#step-3" type="button" id="circle-3" class="not-active btn btn-default btn-circle" disabled="disabled">3</a>

											<p>Step 3</p>

										</div>

										<div class="stepwizard-step">

											<a href="#step-4" type="button" id="circle-4" class="not-active btn btn-default btn-circle" disabled="disabled">4</a>

											<p>Step 4</p>

										</div>

									</div>

								</div>

		  

								<form id="order-info" onsubmit="return setOrder();" name="contact_form" method="post">

									<div class="row setup-content" id="step-1">

										<div class="col-xs-12  col-sm-12">

											<div class="col-md-12">

												<div class="form-group col-sm-6">

													<?php 

													$brand =$customer->getAllBrands();

													$num = count($brand);

													?>

													<label for="email">Mobile Brand</label>

													<select required="required" class="form-control" name="brand_id" id="brand_id" onchange="getModels();">

														<option value="">Select Brand Name</option>	

														<?php 	

														for($i=0;$i<$num;$i++)

														{ 

															?>

															<option value="<?php echo $brand[$i]['brand_id'];?>">

															<?php echo $brand[$i]['brand_name']; ?>

															</option>

															<?php  

														} 

														?>

													</select>

												</div>

												<div class="form-group col-sm-6">

													<div class="form-group">

														<label for="email">Model</label>

														<select required class="form-control" name="model" id="check_model" onchange="checkOther();">

															<option value="">Select Model Name</option>	

															<option value="0">other</option>

														</select>

													</div>

													<div class="form-group" id="check_model_other" style="display:none;">

														<input required type="text" class="form-control" placeholder="Enter model name"/>

													</div>

												</div>

												<button type="button" onclick="check_step(this);" class="btn nextBtn btn-primary btn-sm pull-right">Next</button>

											</div>

										</div>

									</div>

								

									<div class="row setup-content" id="step-2">

										<div class="col-xs-12 col-sm-12">

											<div class="col-md-12">	

												<div class="col-md-12" id="issues_check">

													<h4 style="color:#000;">Select Issues</h4>

													<?php 

													$i = 1;

													$issues = $customer->getAllIssues();

													$cnt = round(count($issues)/2);

													foreach($issues as $d)

													{

														if($i < $cnt)

														{

															?>

															<div class="col-md-6 col-sm-12 col-xs-12">

																<div class="checkbox" style="margin:0 10px;">

																	<input type="checkbox" name="issues[]" class="issues-check" value="<?php echo $d['issues_id'];?>">

																	<span><?php echo $d['title'];?></span>

																</div>

															</div>

															<?php

														}

														else

														{

															?>		

															<div class="col-md-6 col-sm-12 col-xs-12">	

																<div class="checkbox" style="margin:0 10px;">

																	<input type="checkbox" name="issues[]" class="issues-check" value="<?php echo $d['issues_id'];?>">

																	<span><?php echo $d['title'];?></span>

																</div>

															</div>	

															<?php	

														}

														$i++;

													}

													?>

												</div>												

												<div class="col-md-12" style="clear:both;">

													<h4 style="color:#000;">*Notes</h4>

													<ul style="color:#000;">

														<li>1. Rupees 300 payable at the time of pick-up, in case device is not repairable or customer denies for the repairs Rs 200 will be charged as labour charge, rest 100 will be refunded.</li>

														<li>2. After collect the gadget for repairs, it will take 2-3 business days for it to be repaired. It could take longer depending on delays on parts approval and /or parts procurement.</li>

													</ul>

													<input type="checkbox" id="terms_conditions" style="height: 15px;"> I agree to terms and conditions. <a href="#">Terms and conditions.</a> 

												</div>

											</div>

										</div>

										<div class="col-xs-12 col-sm-12">

											<div class="col-md-12">	

												<button type="button" class="btn previousBtn btn-primary btn-sm pull-left" onclick="previous(1);">Previous</button>

												<button onclick="check_step(this);" class="btn btn-primary nextBtn btn-sm pull-right" type="button">Next</button>

											</div>

										</div>

									</div>

									

									<div class="row setup-content" id="step-3">

										<div class="col-xs-12 col-sm-12">

											<div class="col-xs-12 col-sm-12">

											<div class="row">

												<div class="col-md-6 col-sm-6 col-xs-12">

													<div class="form-group">

														<label for="email">Full Name</label>

														<input type="text" class="form-control" id="full_name" placeholder="Enter Full Name" name="full_name" value="<?php echo $data['full_name'];?>" required>

													</div>

												</div>

												<div class="col-md-6 col-sm-6 col-xs-12">

													<div class="form-group">

														<label for="email">Email</label>

														<input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $data['email'];?>" required>

													</div>

												</div>	

												<div class="col-md-6 col-sm-6 col-xs-12">

													<div class="form-group">

														<label for="email">Mobile Number</label>

														<input type="text" disabled style="background: #fff;" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" name="mobile_number" value="<?php echo $data['mobile_number'];?>">

													</div>

												</div>

												<div class="col-md-6 col-sm-6 col-xs-12">

													<div class="form-group">

														<label for="email">Pin-code</label>

														<input type="text" class="form-control" id="pin_code" placeholder="Enter Pincode" name="pin_code" value="<?php if($data['pin_code'] > 0) echo $data['pin_code'];?>" required>

													</div>

												</div>

												<div class="form-group col-sm-6">

													<label class="control-label">Address</label>

													<textarea required="required" class="form-control" name="address"  id="address" placeholder="Enter your address"><?php echo $data['address'];?></textarea>

												</div>

												<div class="form-group col-sm-6">

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

												</div>			

											</div>

											<input type="hidden" name="action" value="setPersonalInformation">

											<!--button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button-->

											<button type="button" class="btn previousBtn btn-primary btn-sm pull-left" onclick="previous(2);">Previous</button>

											<button onclick="check_step(this);" class="btn btn-primary nextBtn btn-sm pull-right" type="button">Next</button>

											</div>

										</div>

									</div>

									

									<div class="row setup-content" id="step-4">

										<div class="col-xs-12 col-sm-12">

											<div class="col-md-12">

												<h3 style="margin-left: 15px;margin-bottom: 15px;">Congrats! You are eligible for instant Pick and drop repair.</h3>

											</div>

											<div class="col-md-12">		

												<div class="form-group col-sm-6">

													<label for="email">Pick-up date and time</label>

													<input type="text" class="form-control" style="background: #fff;" readonly id="pickup_date_time" placeholder="Select pick-up date and time" name="pickup_date_time">

												</div>

												<div class="form-group col-sm-12">

													<button type="button" class="btn previousBtn btn-primary btn-sm pull-left" onclick="previous(3);">Previous</button>

													<button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>

													<input type="hidden" name="action" value="setOrder">

												</div>	

											</div>

										</div>

									</div>

								</form>	

							</div>

							<div id="placeOrderNumber" style="display:none;">

								<h2> Thank you for the order</h2>

								Your order number is : <span id="order_number"></span>

								<!--a href="trackorders"><button type="button" class="btn btn-primary btn-sm">Track Order</button></a-->							

							</div>

						</div>

					</div>

                </div>

            </div>

    	</div>

    </section>

    <!-- service section end -->



<?php

include_once('footer.php');

?>

        

<script src="js/jquery.steps.js"></script>

<script src="js/placeorder.js"></script>   



<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>



<script>

function setOrder()

{

	if($('#pickup_date_time').val() == ''){

		$('#pickup_date_time').addClass('form-error');

		return false;

	}

	

	$('#error_message').hide();

	formData = $('#order-info').serialize();

	$.ajax({

		type: "POST",

		url: "ajax/ajax.customer.php",				

		data: formData,

		success: function(response){

			var data_obj = JSON.parse(response);

			if(data_obj.message == 'success')

			{

				$('#placeOrder').hide();//data_obj.order_number

				$('#placeOrderNumber').show();

				$('#order_number').html(data_obj.order_number);

				$('#pickup_date_time').removeClass('form-error');

			}

			else

				$('#error_message').show();

		}

	});

	return false;

}



function checkOther()

{

	$('#check_model_other').hide();

	if($('#check_model').val()=='0')

		$('#check_model_other').show();

}



function previous(_id)

{

	$('#circle-'+_id).click();

}



$('.issues-check').click(function (){

	$('.issues-check').removeClass('form-checkbox-error');

})



$('input, textarea').focus(function (){

	$(this).removeClass('form-error');

})



$('select').change(function (){

	$(this).removeClass('form-error');

})



function validateEmail(email) {

  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

  return emailReg.test( email );

}



function check_step(_this)

{

	var curStep = $(_this).closest(".setup-content"),

	curStepBtn = curStep.attr("id"),

	nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),

	curInputs = curStep.find("input[type='text'],input[type='url']"),

	isValid = true;

	

	if($('#brand_id').val() == '')

		$('#brand_id').addClass('form-error');

	if($('#check_model').val() == '')

		$('#check_model').addClass('form-error');

	if(curStepBtn == 'step-2' && $('#issues_check input[type=checkbox]:checked').length == 0)

		$('.issues-check').addClass('form-checkbox-error');

	if(curStepBtn == 'step-2' && $("#terms_conditions").prop('checked') == false)

		$('#terms_conditions').addClass('form-checkbox-error');

		

	if(curStepBtn == 'step-3')

	{

		if($('#full_name').val() == '')

			$('#full_name').addClass('form-error');

		if($('#email').val() == '' || !validateEmail($('#email').val()))

			$('#email').addClass('form-error');

		if($('#mobile_number').val() == '')

			$('#mobile_number').addClass('form-error');

		if($('#pin_code').val() == '')

			$('#pin_code').addClass('form-error');

		if($('#address').val() == '')

			$('#address').addClass('form-error');

		if($('#address1').val() == '')

			$('#address1').addClass('form-error');

		if($('#landmark').val() == '')

			$('#landmark').addClass('form-error');

		if($('#city').val() == '')

			$('#city').addClass('form-error');

	}

	

	if(curStepBtn == 'step-1' && $('#brand_id').val() != '' && $('#check_model').val() != '')

	{	

		$('#brand_id,#check_model').removeClass('form-error');

		nextStepWizard.removeAttr('disabled').trigger('click');

	}

	if(curStepBtn == 'step-2' && $('#issues_check input[type=checkbox]:checked').length > 0 && $("#terms_conditions").prop('checked') == true)  

	{

		$('.issues-check').removeClass('form-checkbox-error');

        nextStepWizard.removeAttr('disabled').trigger('click');

	}

	if(curStepBtn == 'step-3' && $('#full_name').val() != '' && $('#email').val() != '' && $('#mobile_number').val() != '' && $('#pin_code').val() != '' && $('#address').val() != '' && $('#address1').val() != '' && $('#landmark').val() != '' && $('#city').val() != '') 

	{		

        $('#full_name,#email,#mobile_number,#pin_code,#addClass,#address1,#landmark,#city').removeClass('form-error');

		nextStepWizard.removeAttr('disabled').trigger('click');

	}

}



function getModels()

{

	if($('#brand_id').val() == '')

	{

		var _html = '<option value="">Select Model Name</option>';

		_html += '<option value="0">Other</option>';

		$('#check_model').html(_html);

	}

	else

	{		

		$.ajax({

			type: "POST",

			url: "ajax/ajax.customer.php",				

			data: { action: 'getModels', brand_id : $('#brand_id').val() },

			success: function(response){

				var data_obj = JSON.parse(response);

				if(data_obj.message == 'success')

				{

					var _html = '<option value="">Select Model Name</option>';

					for(var i=0; i < data_obj.result.length; i++)

					{	

						_html += '<option value="'+data_obj.result[i].model_id+'">'+data_obj.result[i].model_name+'</option>';

					}

					_html += '<option value="0">Other</option>';

					$('#check_model').html(_html);

				}

				else

					$('#error_message').show();

			}

		});

	}

}



$(function () {

	$('#pickup_date_time').datetimepicker({

        weekStart: 1,

        todayBtn:  1,

		autoclose: 1,

		todayHighlight: 1,

		startView: 2,

		forceParse: 0,

        showMeridian: 1

    });

}); 



</script>	
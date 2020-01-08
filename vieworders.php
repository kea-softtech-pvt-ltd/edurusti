<?php

include_once("header.php");

include_once("login_check.php");

include_once('class/class.customer.php');

$customer = new Customer($db);

$data = $customer->getAllOrders($_SESSION['cust_id']);

?>

	<link href="admin/assets/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

	

    <!--Page Title-->

    <section class="page-title">

        <div class="auto-container">

            <div class="content-box">

                <div class="title">My Account</div>

                <ul class="bread-crumb">

                    <li><a href="/">Home<i class="fa fa-angle-right"></i></a></li>

                    <li>View Orders</li>

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

                            <div class="title">View Orders</div>
							
							<div class="table-responsive">
							
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">

									<thead>

										<tr>

											<th>Order Number</th>

											<th>Brand</th>

											<th>Model</th>

											<th>Order Date</th>

											<th>Status</th>

											<th>Action</th>

										</tr>

									</thead>

									<tbody>

										<?php

										foreach($data as $val)

										{
											$trackData = $customer->getStatusOfOrder($val['order_number']);

											if($trackData['track_status'] == '1')

												$status = 'Scheduled';

											if($trackData['track_status'] == '2')

												$status = 'Picked up';

											if($trackData['track_status'] == '3')

												$status = 'In process';

											if($trackData['track_status'] == '4')

												$status = 'Repaired';

											if($trackData['track_status'] == '5')

												$status = 'Shipped';

											if($trackData['track_status'] == '6')

												$status = 'Delivered';

											?>

											<tr>

												<td><?php echo $val['order_number']; ?></td>

												<td><?php echo $val['brand_name']; ?></td>

												<td><?php if($val['model_name'] != "") { echo $val['model_name']; } else { echo $val['other_model'];} ?></td>

												<td><?php if($val['created_date'] != "") { echo $val['created_date']; } else { echo $val['updated_date'];}?></td>

												<td><?php echo $status; ?></td>

												<td>
													<?php 
													if($trackData['track_status'] == 1) 
													{
														?>
														<a href="javascript:void(0);" onclick="cancelOrder(<?php echo $val['ord_id'];?>);">Cancel</a>
														<!--a href="javascript:void(0);" onclick="deleteOrder(<?php echo $val['ord_id'];?>);"><i class="fa fa-trash"></i></a-->
														<?php 
													} 
													else if($trackData['track_status'] == 6) 
													{
														$f = empty($val['order_id'])?0:1;
														
														?>
														<a href="admin/genrate_invoice.php?t=t&id=<?php echo base64_encode($val['ord_id']); ?>" target="_new"><button type="button" class="btn btn-success btn-xs" style="background:#00b300;">View Bill</button></a>
														
														<a href="javascript:void(0);" onclick="orderFeedback('<?php echo $f;?>','<?php echo $val['ord_id'];?>');"><button type="button" class="btn btn-default btn-xs">Feedback</button></a> 
														<?php 
													}
													else
													{
														echo "---"; 
													}												
													?>
												</td>

											</tr>

											<?php

										}

										?>

									</tbody>

								</table>

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

<!-- Modal -->
<div id="orderFeedback" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header" style="background: #4d4d4d;color: #fff;">
			<a href="javascript:void(0);" onclick="$('#orderFeedback').modal('hide');" style="float:right;">&times;</a>
			<span class="modal-title"><b>Provide Feedback</b></span>
		</div>
		<div class="modal-body" id="orderFeedbackFrom">
		
			<div class="alert alert-success" id="feedback_already" style="display:;"><center>You have already provided feedback for this order.</center></div>
						
			<form id="feedback_form" name="feedback_form" action="" class="default-form" method="post" style="display:none;">	
						
				<label for="feedback">Feedback Description</label>
				
				<div class="alert alert-success" id="feedback_form_success" style="display:none;"></div>
				
				<textarea class="form-control" name="feedback" id="feedback" rows="5" placeholder="Please provide your feedback" required></textarea>
				
				<div class="error" style="display:none;" id="feedback_form_error"></div>
				
				<div class="m-t-20">
				
					<input type="hidden" id="order_id" name="order_id" value="0">
					
					<input type="button" class="btn btn-primary pull-right" onclick="feedback_form_new();" name="feedbackForm" value="Submit">
					
				</div>
				
			</form>
			
			<div style="clear:both;"></div>
			
		</div>
    </div>
  </div>
</div>

<script src="admin/assets/datatable/jquery.dataTables.min.js"></script>

<script src="admin/assets/datatable/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready(function() {

    $('#example').DataTable({
        "order": [[ 1, "desc" ]]
    });

});

function orderFeedback(_t,_ord_id)
{
	$('#orderFeedback').modal('show');	
	
	if(_t == '1')
	{
		$('#feedback_form').hide();
		$('#feedback_already').show();
	}
	else
	{
		$('#order_id').val(_ord_id);
		$('#feedback_form').show();
		$('#feedback_already').hide();
	}	
}

function feedback_form_new()

{
	
	var feedback = $('#feedback').val();
	
	if(feedback == '')
	{
		$('#feedback_form_error').show().html('Feedback can not be blank.');
		setTimeout(function(){ $('#feedback_form_error').hide().html(''); }, 3000);
	}
	else
	{	

		$.ajax({
			type: "POST",
			url: "ajax/ajax.customer.php",				
			data: { action: 'orderFeedback', feedback : feedback, order_id : $('#order_id').val() },
			success: function(response){
				var data_obj = JSON.parse(response);			
				if(data_obj.message == 'success')
				{
					$('#feedback').val('');
					$('#order_id').val('');
					$('#feedback_form_success').show().html('Feedback has been added successfully. Thank you for your feedback.');
				}
				else
					$('#feedback_form_error').show().html('Error occured while updating feedback');
				
				setTimeout(function(){ 
				
					$('#feedback_form_success').hide().html('');
					
					$('#feedback_form_error').hide().html('');
					
					$('#orderFeedback').modal('hide');
					
					window.location.reload();
				
				}, 3000);
			}
		});
	}
}

function deleteOrder(_ord_id)

{

	if(confirm('Are you sure want to delete this order?'))

	{		

		$.ajax({

			type: "POST",

			url: "ajax/ajax.customer.php",				

			data: { action: 'deleteOrder', ord_id : _ord_id },

			success: function(response){

				var data_obj = JSON.parse(response);

				if(data_obj.message == 'success')

				{

					window.location = 'vieworders.php';

				}

				else

					$('#error_message').show();

			}

		});

	}

}



function cancelOrder(_ord_id)

{

	if(confirm('Are you sure want to cancel this order?'))

	{		

		$.ajax({

			type: "POST",

			url: "ajax/ajax.customer.php",				

			data: { action: 'cancelOrder', ord_id : _ord_id },

			success: function(response){

				var data_obj = JSON.parse(response);

				if(data_obj.message == 'success')

				{

					window.location = 'vieworders.php';

				}

				else

					$('#error_message').show();

			}

		});

	}

}



</script>
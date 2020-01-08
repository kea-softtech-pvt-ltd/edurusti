<?php
include_once("header.php");
include_once("login_check.php");
include_once('class/class.customer.php');
$customer = new Customer($db);
$data = $customer->getAllCancelledOrders($_SESSION['cust_id']);
?>
	<link href="admin/assets/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="content-box">
                <div class="title">My Account</div>
                <ul class="bread-crumb">
                    <li><a href="/">Home<i class="fa fa-angle-right"></i></a></li>
                    <li>Cancelled Orders</li>
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
                            <div class="title">Cancelled Orders</div>
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
									<thead>
										<tr>
											<th>Order Number</th>
											<th>Brand</th>
											<th>Model</th>
											<th>Order Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach($data as $val)
										{
											?>
											<tr>
												<td><?php echo $val['order_number']; ?></td>
												<td><?php echo $val['brand_name']; ?></td>
												<td><?php if($val['model']==0) echo $val['other_model']; else echo $val['model_name']; ?></td>
												<td><?php echo $val['order_date']; ?></td>
												<td>
													<a href="javascript:void(0);" title="View Details" onclick="getCancelOrderDetails(<?php echo $val['ord_id'];?>);"><i class="fa fa-eye"></i></a>
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
<div id="cancelOrderDetails" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header" style="background: #4d4d4d;color: #fff;">
			<a href="javascript:void(0);" onclick="$('#cancelOrderDetails').modal('hide');" style="float:right;">&times;</a>
			<span class="modal-title"><b>Orders Details</b></span>
		</div>
		<div class="modal-body" id="details">
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

function getCancelOrderDetails(_ord_id)
{
	$('#cancelOrderDetails').modal('show');		
	$.ajax({
		type: "POST",
		url: "ajax/ajax.customer.php",				
		data: { action: 'getCancelOrderDetails', ord_id : _ord_id },
		success: function(response){
			var data_obj = JSON.parse(response);			
			if(data_obj.message == 'success')
			{
				$('#details').html(data_obj.text);
			}
			else
				$('#error_message').show();
		}
	});
}
</script>
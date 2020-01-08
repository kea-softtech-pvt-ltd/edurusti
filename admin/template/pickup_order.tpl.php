<!-- Main content -->

	<section class="content">

		<div class="data">

			<div class="col-sm-12">

				<div class="panel panel-bd ">

					<div class="panel-heading">

						<h2>Manage Delivery</h2>						

					</div>

					<div class="panel-body">

						 <div class="table-responsive">

							<table id="example" class="table table-bordered table-hover">

				<thead>

					<tr>

						<th style="width:150px;">Order Number</th>

						<th>Brand Name</th>

						<th>Modal Name</th>

						<th>Owner Name</th>

						<!--th>Total Bill</th-->
						
						<th>Action</th>

					</tr>

				</thead>

				<?php 

				$j = 1;
				// echo "<pre/>";
				// print_r($Repair_mob);
				// die;

				if($num > 0)

				{

					for($i=0;$i<$num;$i++)

					{
						
						if($Repair_mob[$i]['track_status'] == '1' and $Repair_mob[$i]['order_status'] == '1')
						{	
						?>

						<tr>

						   <td>

							   <label><?php echo $Repair_mob[$i]['order_number'];?></label>   

						   </td>

						  

						   <td><?php echo $Repair_mob[$i]['brand_name'];?></td> 

						    <td><?php if($Repair_mob[$i]['model_name']) { echo $Repair_mob[$i]['model_name'];} else { echo $Repair_mob[$i]['other_model'];}?></td>

						   <td><?php echo $Repair_mob[$i]['full_name'] ?></td>

							 <td>						  

							<button type="button" class="btn btn-default btn-xs" style="background:#E1E3E4;" data-toggle="modal" data-target="#display" onclick="view('<?php echo $Repair_mob[$i]['ord_id']; ?>');"><i class="fa fa-eye" style="color:#000;"></i></button>
							
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="generateOTP('<?php echo $Repair_mob[$i]['cust_id']; ?>','<?php echo $Repair_mob[$i]['order_number']; ?>','2');">Generate OTP</button>
							
						   </td>

						</tr>

						<?php 
						}
						//$j++;

					}

				}

				?>

			</tbody>

		</table>

	</div>

	</div>

	</div>

	</div>

	</div>

</section> 

<!-- /.content -->



<?php include_once('footer.php'); ?>

<!-- Cancel Order -->



<div id="ordine" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<!-- Modal content-->

		<div class="modal-content ">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">×</button>

				<h4 class="modal-title">Generate OTP</h4>

			</div>

			<div class="modal-body">

				<div id="profile_data" style=""></div>	

			</div>	

			<div class="modal-footer" style="border-top: none;"></div>	

		</div>

	</div>

</div>







<!--pop up model for doctor list for display purpose only -->

<div id="display" class="modal fade" role="dialog">

	<div class="modal-dialog">

	<!-- Modal content-->

				<div class="modal-content ">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">×</button>

				<h4 class="modal-title">Mobile Details</h4>

			</div>

			<div class="modal-body">

				<form method="POST" enctype="multipart/form-data" name="profile" id="profile"></form>	

			</div>

		</div>

	</div>

</div>

<script src="js/replair-list.js" type="text/javascript"></script>
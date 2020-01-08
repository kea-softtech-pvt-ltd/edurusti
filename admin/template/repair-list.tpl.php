<!-- Main content -->

	<section class="content">

		<div class="data">

			<div class="col-sm-12">

				<div class="panel panel-bd ">

					<div class="panel-heading">

						<h2>Manage your orders</h2>						

					</div>

					<div class="panel-body">

						 <div class="table-responsive">

							<table id="example" class="table table-bordered table-hover">

				<thead>

					<tr>

						<th style="width:150px;">Order Number</th>

						<th>Brand Name</th>

						<th>Modal Name</th>

						<th>Track status</th>

						<th>Invoice</th>
						
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

						?>

						<tr>

						   <td>

							   <label><?php echo $Repair_mob[$i]['order_number'];?></label>   

						   </td>

						  

						   <td><?php echo $Repair_mob[$i]['brand_name'];?></td> 

						    <td><?php if($Repair_mob[$i]['model_name']) { echo $Repair_mob[$i]['model_name'];} else { echo $Repair_mob[$i]['other_model'];}?></td>

						   <td><?php 
						   
							$Repair_mob_repair_status = $Repair_mob_status->Repair_status($Repair_mob[$i]['order_number']);

							if($Repair_mob[$i]['order_status'] == '1')
							{
						   
								if($Repair_mob_repair_status['track_status'] !="")
								{
									if($Repair_mob_repair_status['track_status']==1){

									echo "Scheduled";

									}

									else if($Repair_mob_repair_status['track_status']==2){

									echo "Picked up";

									}

									else if($Repair_mob_repair_status['track_status']==3){

									echo "In process";

									}

									else if($Repair_mob_repair_status['track_status']==4){

									echo "Repaired";

									}

									else if($Repair_mob_repair_status['track_status']==5){

									echo "Shipped";

									} 

									else if($Repair_mob_repair_status['track_status']==6){

									echo "Delivered";

									}

								}
							}
							else
							{
								echo "Cancelled";
							}						
						   ?></td>

							<td>
								<?php
								if($Repair_mob[$i]['order_status'] > '1')
								{
									echo "Cancelled";
								}
								else if($Repair_mob_repair_status['track_status'] == 6)
								{
									?>
									<a href="genrate_invoice.php?t=t&id=<?php echo base64_encode($Repair_mob[$i]['ord_id']); ?>" target="_new"><button type="button" class="btn btn-success btn-xs" style="background:#00b300;">View Invoice</button></a>
									<?php
								}
								else if($Repair_mob_repair_status['track_status'] >= 4)
								{
									?>
									<a href="genrate_invoice.php?id=<?php echo base64_encode($Repair_mob[$i]['ord_id']); ?>" target="_new"><button type="button" class="btn btn-primary btn-xs">Generate Invoice</button></a>
									<?php
								}
								else
								{
									echo "N/A";
								}							
								?>	
							
							</td>

							 <td>						  

							<button type="button" class="btn btn-default btn-xs" style="background:#E1E3E4;" data-toggle="modal" data-target="#display" onclick="view('<?php echo $Repair_mob[$i]['ord_id']; ?>');"><i class="fa fa-eye" style="color:#000;"></i></button>
							<?php
							if($Repair_mob[$i]['order_status'] == '1')
							{
								if($Repair_mob_repair_status['track_status']==6)
								{
								?>	
								<span style="color:#00b300;">Delivered</span>
								<?php 
								}
								else if($Repair_mob_repair_status['track_status']==5)
								{
								?>	
								<span style="color:#00b300;">Shipped</span>
								<?php 
								}
								else
								{
								?>	
								<!--button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine_cancel" onclick="order_cancel_edurusti('<?php echo $Repair_mob[$i]['ord_id']; ?>');">Cancel</button-->
								<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $Repair_mob[$i]['cust_id']; ?>','<?php echo $Repair_mob[$i]['order_number']; ?>');">Change status</button>
								<?php 
								}							
							}
							else
							{	
								?>	
								<span style="color:orange;">Cancelled</span>
								<?php 
							}
							
						   ?>
							<!--button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $Repair_mob[$i]['ord_id']; ?>');"><i class="fa fa-pencil"></i>

							</button>

							<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $Repair_mob[$i]['ord_id']; ?>');"><i class="fa fa-trash-o"></i>

							</button-->

							

						   </td>

						</tr>

						<?php 

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

				<h4 class="modal-title">Update Track</h4>

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
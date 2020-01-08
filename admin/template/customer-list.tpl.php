<!-- Main content -->

	<section class="content">

		<div class="data">

			<div class="col-sm-12">

				<div class="panel panel-bd ">

					<!--div class="panel-heading">

						<div class="btn-group"> 

							<a class="btn btn-success" href="add-images.php"> <i class="fa fa-plus"></i> Add Advertisement image

							</a>  

						</div>						

					</div-->

					<div class="panel-body">

						 <div class="table-responsive">

							<table id="example" class="table table-bordered table-hover">

				<thead>

					<tr>

						<th style="width:30px;">Sr.No</th>

						<th>Customer Name</th>

						<th>Mobile Number</th>

						<th>Email</th>

						<th>Status</th>

						<th>Action</th>

					</tr>

				</thead>

				<?php 

				$j = 1;

				if($num > 0)

				{

					for($i=0;$i<$num;$i++)

					{

						?>

						<tr>

						   <td>

							   <label><?php echo $j++;?></label>   

						   </td>

						  

						   <td><?php echo $Repair_mob[$i]['full_name'];?></td> 

						    <td><?php echo $Repair_mob[$i]['email'];?></td>	

						   <td><?php echo $Repair_mob[$i]['mobile_number'];?></td>

						   <td><?php if($Repair_mob[$i]['status']) echo "Active"; else echo "De-active";?></td>

						   

							 <td>						  

							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#display" onclick="view('<?php echo $Repair_mob[$i]['cust_id']; ?>');"><i class="fa fa-eye" ></i></button>

							</button>

							

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



<div id="ordine" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<!-- Modal content-->

		<div class="modal-content ">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">×</button>

				<h4 class="modal-title">Update Track</h4>

			</div>

			<div class="modal-body">

				<form method="POST" enctype="multipart/form-data" name="profile_data" id="profile_data"></form>	

			</div>			

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

				<h4 class="modal-title">Customer Details</h4>

			</div>

			<div class="modal-body">

				<form method="POST" enctype="multipart/form-data" name="profile" id="profile"></form>	

			</div>

		</div>

	</div>

</div>









<script src="js/customer-list.js" type="text/javascript"></script>
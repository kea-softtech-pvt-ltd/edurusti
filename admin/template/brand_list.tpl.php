<!-- Main content -->
	<section class="content">
		<div class="data">
			<div class="col-sm-12">
				<div class="panel panel-bd ">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="brand_add.php"> <i class="fa fa-plus"></i> Add Brand
							</a>  
						</div>
						
					</div>
					<div class="alert alert-success hide">
  <strong>Success!</strong> Indicates a successful or positive action.
</div>
					<div class="panel-body">
						 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Brand Name</th>
						<th>Created Date</th>	
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
						   <td><?php echo $category[$i]['brand_name'];?></td>
						   <td><?php echo $category[$i]['created_date'];?></td>						   
						   						   
							<!--td>
								<?php 
									if($category[$i]['status']==1)
									{
										?>
										<button type="button" class="btn btn-danger btn-xs" style="padding-right: 20px;" onclick="activeDeactive(<?php echo $category[$i]['brand_id'];?>,<?php echo $category[$i]['status'];?>);">Active</button>
									<?php
									}
									else
									{
									?>
										<button type="button" class="btn btn-success btn-xs" onclick="activeDeactive(<?php echo $category[$i]['brand_id'];?>,<?php echo $category[$i]['status'];?>);">Deactive</button>
									<?php
									}
								?>
								
							</td-->
						   <td>						  
						<!--	<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#display" onclick="view('<?php echo $category[$i]['brand_id']; ?>');"><i class="fa fa-eye" ></i></button>-->
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $category[$i]['brand_id']; ?>');"><i class="fa fa-pencil"></i>
							</button>
							<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $category[$i]['brand_id']; ?>');"><i class="fa fa-trash-o"></i>
							</button>							
						   </td>
						</tr>
						<?php 
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
				<h4 class="modal-title">Update table</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="cate_data" id="cate_data"></form>	
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
				<h4 class="modal-title">Profile Data</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="profile" id="profile"></form>	
			</div>
		</div>
	</div>
</div>

<script src="js/brand_add.js" type="text/javascript"></script>
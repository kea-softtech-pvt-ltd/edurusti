<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="seo_add.php"> <i class="fa fa-plus"></i> Add Keywords 
							</a>  
						</div>
					</div>
					<div class="panel-body">
						 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Sr. No.</th>
						<th>Keywords</th>
						<th>Keywords Description</th>
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
						   <td><?php echo $keywords_list[$i]['keywords'];?></td>
						   <td><?php echo $keywords_list[$i]['keywords_description'];?></td>
						   <td><?php echo ($keywords_list[$i]['is_active'])?'Activated':'Deactivated';?></td>
						   <td>
								<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $keywords_list[$i]['keywords_id']; ?>');"><i class="fa fa-trash-o"></i></button>
								<button type="button" class="btn btn-info btn-xs"onclick="change_status('<?php echo $keywords_list[$i]['keywords_id']; ?>',<?php echo ($keywords_list[$i]['is_active'])?'0':'1';?>);"><?php echo ($keywords_list[$i]['is_active'])?'De-Active':'Active';?></button>
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
				<form method="POST" enctype="multipart/form-data" name="profile_data" id="profile_data" onsubmit="validateForm();"></form>	
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

<script src="js/keywords_description.js" type="text/javascript"></script>
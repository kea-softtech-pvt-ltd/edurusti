<!-- Main content -->
	<section class="content">
		<div class="data">
			<div class="col-sm-12">
				<div class="panel panel-bd ">
					<div class="panel-heading">
						<div class="btn-group"> 
							<a class="btn btn-success" href="add_images.php"> <i class="fa fa-plus"></i> Add Banner
							</a>  
						</div>						
					</div>
					<div class="panel-body">
						 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Sr.No</th>
						<th>Images</th>
						<th>Title</th>
						<th>Description</th>
						<th>Update</th>
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
						   <td><img src="<?php echo '../images/banner/'.$logo[$i]['image_path'];?>"style="width:250px;height:50px"></td>
						   <td><?php echo $logo[$i]['description'];?></td>
						   <td><?php echo $logo[$i]['title'];?></td>	
							 <td>						  
							<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#display" onclick="view('<?php echo $logo[$i]['banner_id']; ?>');"><i class="fa fa-eye" ></i></button>
							<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" onclick="getData('<?php echo $logo[$i]['banner_id']; ?>');"><i class="fa fa-pencil"></i>
							</button>
							<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $logo[$i]['banner_id']; ?>');"><i class="fa fa-trash-o"></i>
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
				<h4 class="modal-title">Update table</h4>
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
				<h4 class="modal-title">Advertisement Data</h4>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" name="profile" id="profile"></form>	
			</div>
		</div>
	</div>
</div>




<script src="js/logo-list.js" type="text/javascript"></script>
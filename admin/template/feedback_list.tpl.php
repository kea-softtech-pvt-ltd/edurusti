<!-- Main content -->
	<section class="content">
		<div class="data">
			<div class="col-sm-12">
				<div class="panel panel-bd ">
					
					<div class="alert alert-success hide">
					  <strong>Success!</strong> Indicates a successful or positive action.
					</div>
					<div class="panel-body">
						 <div class="table-responsive">
							<table id="example" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="min-width:20px;">Sr.No</th>
						<th>Feedback</th>
						<th style="min-width:150px;">Feedback By</th>
						<th style="min-width:170px;">Date</th>	
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
						   <td><?php echo $feedbacks[$i]['feedback'];?></td>
						   <td><?php if(empty($feedbacks[$i]['full_name'])) echo $feedbacks[$i]['mobile_number']; else echo $feedbacks[$i]['full_name'].' - '.$feedbacks[$i]['mobile_number'];?></td>						   
						   <td><?php echo $feedbacks[$i]['created_date'];?></td>						   
						   <td><?php if($feedbacks[$i]['status'] == '0') { ?>
								<span style="cursor:pointer;" onclick="active_deactive_feedback('<?php echo $feedbacks[$i]['feedback_id']; ?>','1');" class="label-success label label-default">Active</span>
							
							<?php } else { ?>
							<span style="cursor:pointer;" onclick="active_deactive_feedback('<?php echo $feedbacks[$i]['feedback_id']; ?>','0');" class="label-default label label-danger">De-active</span>
							<?php } ?>	</td>						   
						   
						   <td>	
							
							<button type="button" class="btn btn-warning btn-xs" onclick="delete_feedback('<?php echo $feedbacks[$i]['feedback_id']; ?>');"><i class="fa fa-trash-o"></i>
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

<script src="js/feedback.js" type="text/javascript"></script>
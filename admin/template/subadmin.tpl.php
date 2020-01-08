<!-- Main content -->

	<section class="content">

		<div class="data">

			<div class="col-sm-12">

				<div class="panel panel-bd ">

					<div class="panel-heading">

						<div class="btn-group"> 

							<a class="btn btn-success" href="#" data-toggle="modal" data-target="#add_subadmin" > <i class="fa fa-plus"></i> Add Sub-Admin </a>  

						</div>						

					</div>

					<div class="panel-body">

						 <div class="table-responsive">
						 

							<table id="example" class="table table-bordered table-hover">

				<thead>

					<tr>

						<th style="width:30px;">Sr.No</th>

						<th>Full Name</th>

						<th>Mobile Number</th>

						<!--th>Password</th-->

						<!--th>Status</th-->

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

						    <td><?php echo $Repair_mob[$i]['mobile'];?></td>	

						   <!--td><?php echo $Repair_mob[$i]['password'];?></td-->

						   <!--td><?php if($Repair_mob[$i]['is_active']) echo "Active"; else echo "De-active";?></td-->

						   

							 <td>						  

							<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $Repair_mob[$i]['admin_id']; ?>');"><i class="fa fa-trash" ></i></button>

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

<div id="add_subadmin" class="modal fade" role="dialog">

	<div class="modal-dialog">

	<!-- Modal content-->

				<div class="modal-content ">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">×</button>

				<h4 class="modal-title">Add Sub-Admin</h4>

			</div>

			<div class="modal-body">
			
				<div class="alert alert-danger" style="display:none;" id="error"></div>
	
				<div class="form-group">

					<label for="exampleInputEmail1">Full Name</label>

					<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full name">

				</div>
				<div class="form-group">

					<label for="exampleInputEmail1">Mobile Number</label>

					<input type="text" class="form-control" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="mobile_number" name="mobile_number" maxlength="10" placeholder="Mobile Number">

				</div>
				<div class="form-group">

					<label for="exampleInputEmail1">Password</label>

					<input type="text" class="form-control" id="password" name="password" maxlength="16" placeholder="Password">

				</div>
				
				
				
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-success pull-right" onclick="add_subadmin();">Add</button>
			</div>

		</div>

	</div>

</div>

<script>
function confirmation(admin_id)
{
	if(confirm("Are you sure you want to delete this record?"))
	{	
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", 
			type: "POST",
			data: { admin_id : admin_id, action:'delete_subadmin' },//to pass the value on another page 
			success: function(result){
				if($.trim(result)=='success')			
					window.location.href = 'subadmin.php';	
			}	
		});
    }
}

function add_subadmin()
{	
	if($('#full_name').val() == '' || $('#mobile_number').val() == '' || $('#password').val() == '')
	{
		$('#error').show().html('All fields are mandatory')
		setTimeout(function(){ $('#error').hide(); }, 3000);
	}
	else
	{	
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", 
			type: "POST",
			data: { action:'add_subadmin', full_name : $('#full_name').val(), mobile_number : $('#mobile_number').val(), password : $('#password').val() },
			success: function(result){
				if($.trim(result)=='success')			
					window.location.href = 'subadmin.php';	
				else
					$('#error').show().html('Mobile number already exist')
				setTimeout(function(){ $('#error').hide(); }, 3000);		
			}	
		});
	}
}
</script>
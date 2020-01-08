			<!-- Main content -->

                <section class="content">

                    <div class="row">

                        <div class="col-sm-12">

                            <div class="panel panel-bd lobidrag">

                                <div class="panel-heading">

                                    <div class="btn-group"> 

                                        <a class="btn btn-success" href="model_add.php"> <i class="fa fa-plus"></i> Add Model</a>  

                                    </div>   

								<!--<div class="btn-group"> 

										<a class="btn btn-success" href="import_export.php"> <i class="fa fa-file-excel-o"></i>Import And Export Excel File</a>  

								</div>-->

                                </div>

                                <div class="panel-body">                                  

					<div class="table-responsive">

						<table id="example" class="table table-bordered table-hover">

							<thead class="success">

								<tr>	

									<th>Sr.No</th>

									<th>Brand</th>

									<th>Model</th>

										

									<th>Update</th>		

										

								</tr>

							</thead>

							<tbody>

							<?php 

								$j = 1;

								if($num > 0)

								{

									for($i=0;$i<$num;$i++)

									{
										

							?>

								<tr>

								   <td><?php echo $j++;?>

								   </td>   

								   <td><?php echo $cate_sub[$i]['brand_name'];?></td>

								   <td><?php echo $cate_sub[$i]['model_name'];?></td>

								  

								   

								   <td>

										

										

										<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#ordine" 

										onclick="getData('<?php echo $cate_sub[$i]['model_id']; ?>');"><i class="fa fa-pencil"></i>

										</button>

										

										

										<button type="button" class="btn btn-danger btn-xs" onclick="confirmation('<?php echo $cate_sub[$i]['model_id']; ?>');"><i class="fa fa-trash-o"></i>

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

<?php include('footer.php'); ?>





<div id="ordine" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<!-- Modal content-->

		<div class="modal-content ">

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">×</button>

				<h4 class="modal-title">Update table</h4>

			</div>

			<div class="modal-body">

				<form method="POST" enctype="multipart/form-data" name="profile_data" id="profile_data" onsubmit="validateForm();"  ></form>	

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











<script src="js/add-cate_sub.js" type="text/javascript"></script>
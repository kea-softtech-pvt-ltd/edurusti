
                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="model_list.php"> <i class="fa fa-list"></i> Model List</a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form class="col-sm-6" name="sub_cate_data" id="sub_cate_data">
                                            <div class="form-group">
											<?php 
											$category =$sch->getallcate();
											 $num = count($category);
											?>
                                        <label>Brand Name</label>
										 <select class="form-control" name="cate_add" id="cate_add">
										 <option value="">Select Brand Name</option>			
                                             <?php 	
											      for($i=0;$i<$num;$i++)
													{
														?>
															<option value="<?php echo $category[$i]['brand_id'];?>">
															<?php echo $category[$i]['brand_name']; ?>
															</option>
														<?php 
													
													}
											?>
											</select>
											
											<div id="cate_add_error" style="color:#FF0000">
										</div>																																		
                                           <div class="form-group">
                                                <label>  Model Name</label>
                                                <input type="text" class="form-control" name="add_cate_sub" id="add_cate_sub" placeholder="Enter Model Name" required>
												<div id="cate_sub_error" style="color:#FF0000">
												</div>
											</div>   
                                            
                                          <div class="reset-button">
                                               <input type="reset" class="btn btn-warning"/>
                                             <input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="Save"/>
                                         </div>                                         
                                     </form>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </section> <!-- /.content -->
            <?php include_once('footer.php');?>

			
<script src="js/add-cate_sub.js" type="text/javascript"></script>			
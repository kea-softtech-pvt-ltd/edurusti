                    <!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd ">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="brand_list.php"> <i class="fa fa-list"></i> Brand List </a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="registration" name="registration" enctype="multipart/form-data" class="col-sm-12">
                                            <div class="col-sm-6 form-group">
                                                <label>Brand Name</label>
                                                <input type="text" class="form-control" name="cate_name" id="cate_name" placeholder="Enter Brand Name" required style="width: 550px;">
												<div id="cate_name_error" style="color:#FF0000">
												</div>
											</div>                                     
                                              <div class="col-sm-12 reset-button">
                                                 <input type="reset" class="btn btn-warning"/>
                                                <input onclick="validateForm();" type="button" name="submit" class="btn btn-primary" value="submit"/>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </div>                         
                     </section> 
					 <?php include('footer.php'); ?>
<script src="js/brand_add.js" type="text/javascript"></script>
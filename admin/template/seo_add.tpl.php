                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="btn-group"> 
                                        <a class="btn btn-primary" href="issues_list.php"> <i class="fa fa-list"></i> Keywords List</a>  
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="col-sm-6" name="keywords-description-data" id="keywords-description-data">
									<div class="form-group">
                                            <label>Keywords</label>
                                            <input type="text" class="form-control" id="keywords_name" name="keywords_name">
											<div id="keywords_name_error" style="color:#FF0000;display:none;">Keywords already exist.</div>
												
                                        </div>
									 <div class="form-group">
                                            <label>Keywords Description</label>
                                            <textarea class="form-control" id="keywords_desc" name="keywords_desc" rows="3"></textarea>
											<div id="keywords_desc_error" style="color:#FF0000;display:none;">Description can not blank.</div>
												
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
				   </section> 
<?php include_once('footer.php');?>

<script src="js/keywords_description.js" type="text/javascript"></script>
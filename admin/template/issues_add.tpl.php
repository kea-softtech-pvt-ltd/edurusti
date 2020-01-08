                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- Form controls -->
                        <div class="col-sm-12">
                            <div class="panel panel-bd ">
                                <div class="panel-heading">
                                    <div class="btn-group"> 
                                        <a class="btn btn-primary" href="issues_list.php"> <i class="fa fa-list"></i>  Issue List</a>  
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form class="col-sm-6" name="issue-description-data" id="issue-description-data">
									 <div class="form-group">
                                            <label>Issue</label>
                                            <textarea class="form-control" id="issue_desc" name="issue_desc" rows="3"></textarea>
											<div id="issue_desc_error" style="color:#FF0000;display:none;">Issue name already exist.</div>
												
                                        </div>
										<input type="hidden" name="price" id="price" class="form-control" placeholder="Enter Price" value="0"/>
                                        <!--div class="form-group">
                                            <label>Price</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price"/>
											<div id="price_error" style="color:#FF0000">
												</div>
                                        </div-->
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

<script src="js/issue_description.js" type="text/javascript"></script>
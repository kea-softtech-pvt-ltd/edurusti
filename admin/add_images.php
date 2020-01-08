<?php 
include_once('header.php');
?>

<style type="text/css">
.thumb-image{
 float:left;
 width:150px;
 position:relative;
 padding:10px;
}
</style>


<!-- Main content -->
                    <section class="content">
                        <div class="row">
                            <!-- Form controls -->
                            <div class="col-sm-12">
                                <div class="panel panel-bd lobidrag">
                                    <div class="panel-heading">
                                        <div class="btn-group"> 
                                            <a class="btn btn-primary" href="list_images.php"> <i class="fa fa-list"></i>  Banner List </a>  
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" id="registration" name="registration" enctype="multipart/form-data" class="col-sm-12">
                                               <div class="col-sm-6 form-group">
                                                <label >Picture upload</label>
                                                <input type="file" class="form-control" name="picture" id="picture"/>
												<div id="image-holder"></div>
												<div id="picture_error" style="color:#FF0000">
												</div> 
												</div>
												
											
											<div class="col-md-8 form-group">
                                                <label>Title</label>
                                                 <input type="text" name="title" class="form-control" id="title" value="">
												<div id="_title_error" style="color:#FF0000">
												</div>
                                            </div>   											 
                                            <div class="col-md-8 form-group">
                                                <label>Description</label>
                                                <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter text ..."></textarea>
												<div id="description_error" style="color:#FF0000">
												</div>
                                            </div>   
											
                                              <div class="col-sm-12 reset-button">
                                                 <input type="reset" class="btn btn-warning"/>
                                                <input onclick="validateForm1();" type="button" name="submit" class="btn btn-primary" value="submit"/>
												</div>
											 </div>  
                                         </form>
										 <script>
										 


										 </script>
                                     </div>
                                 </div>
                             </div>
                         </div>                         
                     </section> 
					

<?php
include_once('footer.php');
?>

<script>
$(document).ready(function() {
        $("#picture").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
</script>

<script src="js/add-logo.js" type="text/javascript"></script>

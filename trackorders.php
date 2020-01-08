<?php

include_once("header.php");

//include_once("login_check.php");

?>

    <!--Page Title-->

    <section class="page-title">

        <div class="auto-container">

            <div class="content-box">

                <div class="title">My Account</div>

                <ul class="bread-crumb">

                    <li><a href="./">Home<i class="fa fa-angle-right"></i></a></li>

                    <li>Track Order</li>

                </ul>

            </div>

        </div>

    </section>

    <!--End Page Title-->



    <!-- service section -->

    <section class="sidebar-page-container">

    	<div class="container">

    	 	<div class="row">

                <div class="content-side col-md-3 col-sm-6 col-xs-12">

                    <?php include_once('sidebar_menu.php'); ?>

                </div>

                <div class="content-side col-md-9 col-sm-12 col-xs-12 user-right">

                    <div class="service-detail contact-area">

                       <div class="service-detail-content">

                            <div class="title">Track Order</div>							

							<div class="col-md-12 col-sm-12 col-xs-12">
							
								
								<form id="track-order" onsubmit="return getOrderTrackingStatus();" method="post">

									<!--label for="email">Order Number</label>

									<div class="input-group">

										<input type="text" required class="form-control" id="order_number" placeholder="Enter Order Number" name="order_number" style="padding:25px;">

										<span class="input-group-addon" onclick="document.getElementById('track-order').submit()">Search</span>

										<input type="hidden" name="action" value="getOrderTrackingStatus">

									</div-->

									<div class="col-md-6" style="margin: 0;padding: 0;">

										<div class="form-group">

											<label for="email">Order Number</label>

											<input type="text" required class="form-control" maxlength="8" id="order_number" placeholder="Enter Order Number" name="order_number" style="padding:25px;">

										</div>

									</div>

									<div class="col-md-6">

										<input type="hidden" name="action" value="getOrderTrackingStatus">

										<button type="submit" class="btn btn-primary btn-sm" style="margin-top:32px;height:52px;font-size:20px;">Search</button>

									</div>

								</form>

							</div>
							
							<div class="col-md-12 col-sm-12 col-xs-12" id="tracking" style="display:none;margin-top:40px;"></div>

							<div class="col-md-12 col-sm-12 col-xs-12" style="display:;margin-top:50px;">

								<ul class="timeline">

									<li>

										<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>

										<div id="track_1" class="timeline-panel">

											<div class="timeline-heading">

												<h4 class="timeline-title">Scheduled</h4>


											</div>

										</div>

									</li>

									<li class="timeline-inverted">

									  <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>

									  <div id="track_2" class="timeline-panel">

										<div class="timeline-heading">

										  <h4 class="timeline-title">Picked-up</h4>


										</div>

									  </div>

									</li> 

									<li>

										<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>

										<div id="track_3" class="timeline-panel">

											<div class="timeline-heading">

												<h4 class="timeline-title">In-process</h4>


											</div>

										</div>

									</li>

									<li class="timeline-inverted">

									  <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>

									  <div id="track_4" class="timeline-panel">

										<div class="timeline-heading">

										  <h4 class="timeline-title">Repaired</h4>


										</div>

									  </div>

									</li>  

									<li>

										<div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>

										<div id="track_5" class="timeline-panel">

											<div class="timeline-heading">

												<h4 class="timeline-title">Shipped</h4>


											</div>

										</div>

									</li>

									<li class="timeline-inverted">

									  <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>

									  <div id="track_6" class="timeline-panel">

										<div class="timeline-heading">

										  <h4 class="timeline-title">Delivered</h4>


										</div>

									  </div>

									</li> 									

								</ul>

							</div>

                        </div>

                    </div>

                </div>

            </div>

    	</div>

    </section>

    <!-- service section end -->



   <?php

include_once('footer.php');

?>

<script>

function getOrderTrackingStatus()

{

	formData = $('#track-order').serialize();

	$.ajax({

		type: "POST",

		url: "ajax/ajax.customer.php",				

		data: formData,

		success: function(response){

			$('#tracking').hide().html('');

			$('.timeline-panel').removeClass('complete');
			
			var data_obj = JSON.parse(response);
			
			if(data_obj.message == 'cancelled')

			{
				$('#tracking').show().html('<h3 class="alert alert-danger">This order has been cancelled.</h3>');
				
				setTimeout(function(){ $('#tracking').hide(); }, 5000);
			}

			else if(data_obj.message == 'success')

			{

				for(var i=1; i <= data_obj.result.length; i++)

				{

					$('#track_'+i).addClass('complete');

				}

				/*

				var _html = '<ul class="timeline">';

				for(var i=0; i < data_obj.result.length; i++)

				{	

					var _status = '';

					var _status_count = data_obj.result[i].status;

					if(_status_count == '1')

						_status = 'Scheduled';

					else if(_status_count == '2')

						var _status = 'Picked-up';

					else if(_status_count == '3')

						var _status = 'In-process';

					else if(_status_count == '4')

						var _status = 'Repaired';

					else if(_status_count == '5')

						var _status = 'Shipped';

					else if(_status_count == '6')

						var _status = 'delivered';

					

			

					if(i%2)

					{												

						_html += '<li class="timeline-inverted"><div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+_status+'</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '+data_obj.result[i].created_date+'</small></p></div></div></li>';

					}

					else

					{

						_html += '<li><div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+_status+'</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> '+data_obj.result[i].created_date+'</small></p></div></div></li>';

					}

				}

				_html += '</ul>';

				

				$('#tracking').show().html(_html);

				*/

			}

			else
				
			{

				$('#tracking').show().html('<h3 class="alert alert-danger">No result round, Please try with different order number.</h3>');
				
				setTimeout(function(){ $('#tracking').hide(); }, 5000);
				
			}	

		}

	});

	return false;

}

</script>  


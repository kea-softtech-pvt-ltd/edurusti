<?php

include_once("header.php");

include_once('class/class.customer.php');

$customer = new Customer($db);

$banner = $customer->getBanners();

$feedbacks = $customer->getFeedbacks();

?>
	<!--Main Slider-->
    <section class="main-banner banner hide">
	
	    <div class="rev_slider_wrapper">
		
	        <div id="main_slider" class="rev_slider"  data-version="5.0">
			
	            <ul>
				
					<?php
					
					$empty = true;
					
					if(!empty($banner))
					{
						foreach($banner as $img)					
						{
							
							if(file_exists('images/banner/'.$img['image_path']))
							{
								?>
								<li data-index='rs-356' class="slide_show slide_2" data-transition='slidingoverlaytop' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Slots vertical' data-description=''>
								
									<img src="images/banner/<?php echo $img['image_path'];?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
									
								</li>
								
								<?php
								$empty = false;
							}
							
						}
					}
					
					if($empty)
					{
						?>
						
						<li data-index='rs-356' class="slide_show slide_2" data-transition='slidingoverlaytop' data-slotamount='default' data-easein='default' data-easeout='default' data-masterspeed='default' data-rotate='0' data-saveperformance='off' data-title='Slide Slots vertical' data-description=''>
						
							<img src="images/slider/5.jpg" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg">
							
						</li>
						
						<?php
					}				
					?>	
					
	            </ul>
				
	        </div>
			
	    </div>
		
    </section>
	
    <!--Main Slider End-->


	<!-- appointment section -->

    <!--section class="appointment-section">

    	<div class="has-overlay">

            <div class="container">

                <div class="row">

					<div class="col-md-6 col-sm-6 col-xs-12" >

					

					</div>

					<div class="col-md-6 col-sm-6 col-xs-12" >

                        <div class="appointment-area">

							<?php 

							if($isLoggedIn) 

							{

								?>		

								<div id="mobile_repair">

									<div class="title">Welcome <?php //echo $_SESSION['mobile_number'];?></div>

									<div class="section-title">Schedule a repair</div>

									<div class="appoinment-btn">

										<a href="placeorder"><button type="button" class="btn-sm" data-loading-text="Please wait...">Schedule</button></a>

									</div>

								</div>

								<?php

							}

							else

							{

								?>		

								<div>

									<div class="title">Want to </div>

									<div class="section-title">Schedule a repair</div>

									<form id="mobile_repair" name="contact_form" class="default-form" action="" method="post">										

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<div class="input-group">

													<span class="input-group-addon">+91</span>

													<input type="tel" style="margin-bottom:0px;" maxlength="10" class="form-control only-no" name="mobile_number" id="mobile_number" pattern="[0-9]{10}" value="" placeholder="Your Mobile Number" required>

												</div>
												<span id="error_form_name" class="error" style="display:none;">Please enter mobile number.</span>

												<span class="error regi_user_phone"></span>

											</div>

										</div>

										<div class="">

											<button type="button" style="margin-top:20px;" class="btn-sm" data-loading-text="Please wait..." onclick="generate_otp();">Schedule</button>

										</div>

									</form>

									<form id="otp_repair" name="contact_form" class="default-form" action="" method="post" style="display:none;">

										<div class="row">

											<div class="col-md-6 col-sm-12 col-xs-12">

												<input type="text" name="otp_numer" id="otp_numer" maxlength="6" value="" class="only-no-otp" autocomplete="off" placeholder="Enter OTP" required="" style="margin-bottom:0px;">

												<a href="javascript:void(0);" onclick="generate_otp();" style="float: right;margin-bottom: 20px;">Resend OTP</a>

												<span id="error_otp_numer" class="error" style="display:none;">Please enter OTP.</span>

												<span id="invalid_otp_numer" class="error" style="display:none;">Invalid OTP.</span>

												<span class="error error2" style="display: none">* Input digits (0 - 9)</span>

											</div>

										</div>

										<div class="appoinment-btn">

											<button type="button" data-loading-text="Please wait..."  onclick="verify_otp();">Verify & Schedule</button>

										</div>

									</form>

								</div>

								<?php

							}

							?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section-->

    <!-- appointment section end -->

	

    <!-- about section -->

    <section class="about-section">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-12 col-sm-12 col-xs-12">

    				<div class="about-content" style="padding: 100px 0;">

    					<div class="text">Welcome to</div>

    					<div class="title">Our eDurusti</div>

    					<h4 style="text-align: justify;">

						eDurusti is a leading mobile repair service provider. We offer world class mobile phone repairing services for all branded smart-phones & tablets, across Maharashtra through our dedicated mobile phone repair service centres. It does not matter what sort of fault has struck your mobile/tablet, ranging from minor mobile faults like signal issues to major issues like motherboard repair, we fix them all with care and precision. 

						</h4>

    					<p>We provide quality repairs for all branded smart-phones/tabs including Samsung, Apple, One Plus, Karbbon, Motorola, LG, Sony, HTC, Lenovo, Gionee, Max, Letv, Blackberry, ASUS, Vivo and many more.</p>

    					<div class="about-btn">

    						<a href="contact" class="btn-style-one">Contact Us</a>

    						<a href="our-service" class="btn-style-two">Explore More</a>

    					</div>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- about section end -->



    <!-- service section -->

    <section class="service-section text-center">

    	<div class="container">

    		<div class="service-title">

    			<div class="section-title">Our Services</div>

    		</div>

    		<div class="row">

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item">

                        <div class="inner-box">

                            <div class="img-box">

	    						<img src="images/service/1.jpg" alt="">

	    					</div>

                        </div>

                        <div class="img-title"><a href="javascript:void(0);">Smart Phone Repair</a></div>

                    </div>

    			</div>

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item">

                        <div class="inner-box">

                            <div class="img-box">

	    						<img src="images/service/2.jpg" alt="">

	    					</div>

                        </div>

                        <div class="img-title"><a href="javascript:void(0);">Tablet & ipad Repair</a></div>

                    </div>

    			</div>

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item">

                        <div class="inner-box">

                            <div class="img-box">

	    						<img src="images/service/MG_2477.jpg" alt="">

	    					</div>

                        </div>

                        <div class="img-title"><a href="javascript:void(0);">iPhone Repair</a></div>

                    </div>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- service section end -->



    <!-- catagory section -->

    <section class="catagory-section">

    	<div class="container">

    		<div class="catagory-title text-center">

    			<div class="section-title">Our Categories</div>

    		</div>

    		<div class="row" id="our_cat">

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Glass Repair</h3>    						

							<ul class="b">

								<li>- Glass Damage</li>

								<li>- Screen Damage</li>

								<li>- Scratches</li>

							</ul>

    					</div>

    				</div>

    			</div>

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Camera Failure</h3>

    						<ul class="b">	

								<li>- Broken/Missing Lens</li>

								<li>- Spot in Camera</li>

								<li>- Blur Images</li>

							</ul>

    					</div>

    				</div>

    			</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Display Issues</h3>

    						<ul>

								<li>- Screen Flickering</li>

								<li>- Line/Dot on Display</li>

								<li>- Yellow Screen</li>

							</ul>

    					</div>

    				</div>

    			</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Speaker Failure</h3>

    						<ul>

								<li>- Earphone Jack Malfunctions</li>

								<li>- Mic damaged</li>

								<li>- Treble Voice</li>

							</ul>

    					</div>

    				</div>

    			</div>

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Battery Replacement</h3>

    						<ul>

								<li>- Old Battery</li>

								<li>- No Charging</li>

								<li>- Slow Charging</li>

							</ul>

    					</div>

    				</div>

    			</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Mobile Overheating</h3>

    						<ul>

								<li>- Overcharging of Phone</li>

								<li>- Continuous Gaming</li>

								<li>- Continuous Multi-Tasking</li>

							</ul>

    					</div>

    				</div>

    			</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Signal Issues</h3>

    						<ul>

								<li>- Damaged Signal Receivers</li>

								<li>- Any Hardware Fault</li>

								<li>- Any Software Fault</li>

							</ul>

    					</div>

    				</div>

    			</div>

    			<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Motherboard Problem</h3>

    						<ul>

								<li>- Water damaged Motherboard</li>

								<li>- Inadequate Power Supply</li>

								<li>- Short Circuit</li>

							</ul>

    					</div>

    				</div>

    			</div>

				<div class="col-md-4 col-sm-6 col-xs-12">

    				<div class="single-item hvr-float-shadow">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<div class="catagory-content">

    						<h3>Water Damage</h3>

    						<ul>

								<li>- Complete Immersion in water</li>

								<li>- Moisture Penetration</li>

								<li>- Rain Damage</li>

							</ul>

    					</div>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- catagory section end -->



    <!-- fact counter section -->

    <section class="fact-counter">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-3 col-sm-6 col-xs-12">

    				<div class="single-item-one">

    					<article class="column wow fadeIn" data-wow-duration="0ms">

                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="25">12</span><h1>+</h1></div>

                            <div class="text">Years Experience</div>

                        </article>

    				</div>

    			</div>

    			<div class="col-md-3 col-sm-6 col-xs-12">

    				<div class="single-item-two">

    					<article class="column wow fadeIn" data-wow-duration="0ms">

                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="1250">1200</span><h1>+</h1></div>

                            <div class="text">Happy Customers</div>

                        </article>

    				</div>

    			</div>

    			<div class="col-md-3 col-sm-6 col-xs-12">

    				<div class="single-item-three">

    					<article class="column wow fadeIn" data-wow-duration="0ms">

                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="150">15</span><h1>+</h1></div>

                            <div class="text">Expert Technicians</div>

                        </article>

    				</div>

    			</div>

    			<div class="col-md-3 col-sm-6 col-xs-12">

    				<div class="single-item-four">

    					<article class="column wow fadeIn" data-wow-duration="0ms">

                            <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="3550">2100</span><h1>+</h1></div>

                            <div class="text">Total Works Done</div>

                        </article>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- fact counter section end -->



    <!-- choose section -->

    <section class="choose-section">

    	<div class="container">

    		<div class="choose-title text-center">

    			<div class="section-title">Why Choose Us?</div>

    		</div>

    		<div class="row">

    			<div class="col-md-4 col-sm-12 col-xs-12 text-right">

    				<div class="single-item">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<h4>Low Cost</h4>

    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

    				</div>

    				<div class="single-item">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<h4>Best Materials</h4>

    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

    				</div>

					<div class="single-item">

    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

    					<h4> Certified Technicians </h4>

    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

    				</div>

    			</div>

    			<div class="col-md-4 col-sm-12 col-xs-12">

    				<div class="img-box">

    					<figure><img src="images/home/iphone-1.png" alt=""></figure>

    				</div>

    			</div>

    			<div class="col-md-4 col-sm-12 col-xs-12">

    				<div class="choose-right">

    					<div class="single-item">

	    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

	    					<h4>Best Professionals</h4>

	    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

	    				</div>

	    				<div class="single-item">

	    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

	    					<h4>Low Cost</h4>

	    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

	    				</div>

						<div class="single-item">

	    					<div class="icon-box"><i class="flaticon-smartphone-call"></i></div>

	    					<h4>Free Device Pick-up & Drop </h4>

	    					<p>We provide quality repairs for all branded smart-phones/tabs.</p>

	    				</div>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

    <!-- choose section end -->

	

    <!-- working section -->

    <section class="working-section">

        <div class="container">

            <div class="working-title text-center">

                <div class="section-title">Working Process</div>

            </div>

            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="single-item-one">

                        <div class="icon-box"><i class="fa fa-desktop" aria-hidden="true"></i></div>

                        <div class="number">1</div>

                        <h4>Damage Device</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="single-item-two">

                        <div class="icon-box"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>

                        <div class="number">2</div>

                        <h4>Send it to Us</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="single-item-three">

                        <div class="icon-box"><i class="fa fa-cogs" aria-hidden="true"></i></div>

                        <div class="number">3</div>

                        <h4>Repair Device</h4>

                    </div>

                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="single-item-four">

                        <div class="icon-box"><i class="fa fa-reply" aria-hidden="true"></i></div>

                        <div class="number">4</div>

                        <h4>Quick Return</h4>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- working section end -->
	
	    <!-- testimonial & faq section -->
    <section class="testimonial-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="testimonial-area">
                        <div class="testimonial-title"><div class="section-title">Trusted Customers</div></div>
                        <div class="testimonial-slider">
							<?php
							if(!empty($feedbacks))
							{
								foreach($feedbacks as $val)					
								{
									?>
									<div class="testimonial-content">
										<div class="img-box"><figure><img src="images/home/user.jpg" style="width:13%;" alt=""></figure></div>
										<p><?php echo $val['feedback'];?></p>
										<div class="testimonial-autor">
											<h4><?php echo $val['full_name'];?></h4>
											<div class="text">Happy Customer</div>
										</div>
									</div>
									<?php									
								}
							}
							?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="accrodian-area">
                        <div class="accordion-title"><div class="section-title">FAQ</div></div>
                        <div class="accordion-box">
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn active">
                                    <b>Can I track my repair?</b>
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content collapsed">
                                    <p>Yes, you can. We have two such services that enable you to receive latest updates about your device. Live updates on repair and regular update via sms and provided track order option for customer.</p>
                                </div>
                            </div>
							<div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    <b>In how many days will I receive my repaired device?</b>
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>It all depends on the nature and degree of damage. If the issue is related to ear phones, speaker or volume button non-functioning, then they can be resolved in a very short span. But issues related to motherboard replacement, or screen replacement requires time as such tasks needs to be performed with utmost care and attention.</p>
                                </div>
                            </div>                            
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    <b>What will happen to my personal data when my phone is in your custody?</b>
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>We understand how vital your personal data and information are, that is why we request our customers to take a backup before surrendering their device. All the mobile phones are safe in our custody, but eDurusti cannot be held responsible for any privacy breach in any manner.</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    <b>When and how payments are made?</b>
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>As per the company’s policy we take half payment before the repair and the other half at the time of delivery. We accept both cash and online payments, so you can pay in whichever way that is convenient for you.</p>
                                </div>
                            </div>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    <b>Can you repair water damaged phones?</b>
                                    <div class="toggle-icon">
                                        <i class="plus fa fa-plus"></i><i class="minus fa fa-minus"></i>
                                    </div>
                                </div>
                                <div class="acc-content">
                                    <p>Yes, our team of certified technicians can repair any damage. If you have accidental dropped your smart device in water or moisture has disabled your phone’s normal functioning then we can assist you with best solution at affordable price.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial & faq section end -->

<?php include_once('footer.php'); ?>

<script src="js/slider/jquery.themepunch.tools.min.js"></script>
<script src="js/slider/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="js/slider/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/slider/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/slider/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/slider/theme.js"></script>

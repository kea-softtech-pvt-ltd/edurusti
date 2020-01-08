<?php 

include_once('includes/application_top.php'); 

include_once('class/class.seo.php');

$seo = new seo($db);

$keywords = $seo->get_seo_data();

if(isset($_SESSION['mobile_number']) && !empty($_SESSION['mobile_number']))

	$isLoggedIn = true; 

else

	$isLoggedIn = false;

?>

<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<title>eDurusti</title>

		<!-- Stylesheets -->

		<link href="css/bootstrap.css" rel="stylesheet">

		<link href="css/style.css" rel="stylesheet">



		<!--Favicon-->

		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

		<link rel="icon" href="images/favicon.png" type="image/x-icon">

		<meta name="google-site-verification" content="lSbifBXMdRoCN4OuUszyYg47Tv78itpOsYXdMvMTc2o" />
		<meta name="title" content="Mobile repair(Durusti) in Pune, online mobile booking and repair">
		<meta name="description" content="<?php if(isset($keywords)) echo $keywords['keywords_description']; ?>">
		<meta name="keywords" content="<?php if(isset($keywords)) echo $keywords['keywords']; ?>">
		<meta name="robots" content="index, follow">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="English">
		<meta name="revisit-after" content="1 days">
		<meta name="author" content="KEA Softtech Private Limited">

		<!-- Responsive -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

		<link href="css/responsive.css" rel="stylesheet">

	</head>

<body>



<div class="page-wrapper">

	<?php
	
	if(!$isLoggedIn) 	
	{		
		?>	
		<a href="placeorder" title="Book Repair">
			<div class="color-sw-open" id="color-sw-open"> <i class="fa fa-user"></i> </div>
		</a>		
		<?php	
	}
	else
	{
		?>	
		<a href="placeorder">
			<div class="color-sw-open" id="color-sw-open" title="Book Repair"> <i class="fa fa-calendar"></i> </div>
		</a>		
		<?php
	}

	?>	
	
    <header class="main-header">

        <div class="outer-area header-top-box">

        	<div class="container">

    			<div class="logo">

    				<a href="./"><img src="images/home/logo.png" alt=""></a>

    			</div>

    			<div class="single-info-box">    				

    				<div class="single-info">

    					<div class="icon-box"><i class="flaticon-envelope"></i></div>

    					<div class="title">Email Us</div>

    					<a class="text" href="mailto:info@edurusti.com">info@edurusti.com</a>

    				</div>

    				<div class="single-info">

    					<div class="icon-box"><i class='fa fa-whatsapp'></i></div>

    					<div class="title">Call Us Now</div>

    					<a href="tel:+91 770-908-4510" class="text-phone">+91 770-908-4510</a>

    				</div>

    			</div>

        	</div>

        </div> 



        <div class="header-lower">

            <div class="container">

            	<div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="menu-bar">

                            <nav class="main-menu">

                                <div class="navbar-header" style="width:100%;" >

									<a href="./" class="mlogo" style="float:left;padding:2px 10px;">

										<img src="images/home/logo_mobile.png" alt="" style="width:84px;float:left;">

									</a>

                                    <button type="button" class="navbar-toggle" style="float:right;" data-toggle="collapse" data-target=".navbar-collapse">

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                    </button>
									
									<?php

										if(!$isLoggedIn) 
										{

											?>
											
											<!--a href="javascript:void(0);" class="mlogo" style="color:#fff;margin-top:5px;" onclick="loginModal();"><i class="fa fa-user"></i> Book Repair</a-->
											
											<a href="placeorder" class="mlogo" style="color:#fff;margin-top:5px;"><i class="fa fa-user"></i> Book Repair</a>
											
											<?php
										}
											
									?>
									
                                </div>

                                <div class="navbar-collapse collapse clearfix">

                                    <ul class="navigation clearfix">

                                        <li <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'class="current"'; ?>><a href="./">Home</a></li>

                                        <li <?php if(basename($_SERVER['PHP_SELF'])=='our-service.php') echo 'class="current"'; ?>><a href="our-service">Services</a></li>

										<li <?php if(basename($_SERVER['PHP_SELF'])=='about.php') echo 'class="current"'; ?>><a href="about">About</a></li>

                                        <li <?php if(basename($_SERVER['PHP_SELF'])=='contact.php') echo 'class="current"'; ?>><a href="contact">contact</a></li>
										
                                        <li <?php if(basename($_SERVER['PHP_SELF'])=='trackorders.php') echo 'class="current"'; ?>><a href="trackorders">Track Order</a></li>
									

                                    </ul>

                                </div>

                            </nav>

							<nav class="main-menu" style="float:right;">

								<div class="navbar-collapse collapse clearfix">

									<ul class="navigation clearfix">											
										<?php

										if($isLoggedIn) 
										{

											?>
											<li class="dropdown">

												<a href="dashboard"><i class="fa fa-user"></i> My Account</a>

												<ul>

													<li><a href="dashboard">Profile</a></li>
													
													<li><a href="placeorder">Book Repair</a></li>

													<li><a href="trackorders">Track Order</a></li>

													<li><a href="logout">Logout</a></li>

												</ul>

											</li>
											<?php
											
										}
										else
										{
										
											?>	
											
											<li class="dropdown">

												<!--a href="javascript:void(0);" onclick="loginModal();"><i class="fa fa-user"></i> Book Repair</a-->
												
												<a href="placeorder"><i class="fa fa-user"></i> Book Repair</a>
												
											</li>
											
											<?php
											
										}
										
										?>
									</ul>

								</div>

							</nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!--Sticky Header-->

        <div class="sticky-header">

            <div class="container clearfix">

                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="menu-bar">

                            <nav class="main-menu">

                                <div class="navbar-header">

                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                        <span class="icon-bar"></span>

                                    </button>

                                </div>

                                <div class="navbar-collapse collapse clearfix">

                                    <ul class="navigation clearfix">

                                         <li class="current"><a href="/">Home</a></li>

                                        <li><a href="our-service">Services</a></li>

										<li><a href="about">About</a></li>

                                        <li><a href="contact">contact</a></li>	
										
										<li><a href="trackorders">Track Order</a></li>

                                    </ul>

                                </div>

                            </nav>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </header>

    <!--End Sticky Header-->

    <!-- main header area end -->
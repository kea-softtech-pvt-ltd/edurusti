<?php
include_once('includes/application_top.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> eDurusti</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
    
        <!-- Start Global Mandatory Style
        =====================================================================-->
        <!-- jquery-ui css -->
        <link href="assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap -->
        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Bootstrap rtl -->
        <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->
        <!-- Lobipanel css -->
        <link href="assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
        <!-- Pace css -->
        <link href="assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
        <!-- Font Awesome -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- Pe-icon -->
        <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
        <!-- Themify icons -->
        <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
		<!--css for datatables-->
		<!--css for datatables-->
		<link rel="stylesheet" type="text/css" href="assets/datatable/dataTables.bootstrap4.min.css"/>
		<!-- End Global Mandatory Style
        =====================================================================-->
        <!-- Start Theme Layout Style
        =====================================================================-->
        <!-- Theme style -->
        <link href="assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style rtl -->
        <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->
        <!-- End Theme Layout Style
        =====================================================================-->

	
    </head>
    <body class="hold-transition sidebar-mini">        
        <!-- Site wrapper -->
        <div class="wrapper">
			<header class="main-header">
				<a href="../index.php" class="logo"> <!-- Logo -->
					<span class="logo-mini">
						<!--<b>A</b>BD-->
						<img src="../images/home/logo_mobile.png" alt="">
					</span>
					<span class="logo-lg">
						<img src="../images/home/logo_mobile.png" alt="">
					</span>
				</a>
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top ">
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-tasks"></span>
					</a>
	
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- user -->
							<li class="dropdown dropdown-user admin-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
									<i class="fa fa-user fa-lg"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="profile.php"><i class="fa fa-users"></i> User Profile</a></li>
									<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- =============================================== -->
			<!-- Left side column. contains the sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar -->
				<div class="sidebar">
					<!-- Sidebar user panel -->
					<div class="user-panel">
						<div class="info">
							<h4>Welcome</h4>
							<p><?php echo $_SESSION['name'];?></p>
						</div>
					</div>
					<?php
						$pageName = basename(substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'.')));
					?>
					<!-- sidebar menu -->
					<ul class="sidebar-menu">
					
						<?php 
						if($_SESSION['role']=='1')
						{	
							?>
							<li class="<?php if($pageName=='repair-list'){?>active<?php }?>">
								<a href="repair-list.php"><i class="fa fa-hospital-o"></i><span>Orders</span></a>
							</li>
							<?php
						}
						
						if($_SESSION['role'] >= '1')
						{	
							?>
							<li class="<?php if($pageName=='pickup_order'){?>active<?php }?>">
								<a href="pickup_order.php"><i class="fa fa-check-square-o"></i><span>Manage Pick-up</span></a>
							</li>
							<li class="<?php if($pageName=='deliver_order'){?>active<?php }?>">
								<a href="deliver_order.php"><i class="fa fa-check-square-o"></i><span>Manage Delivery</span></a>
							</li>
							<?php 
						}
						
						if($_SESSION['role']=='1')
						{	
							?>
							<li class="<?php if($pageName=='subadmin'){?>active<?php }?>">
								<a href="subadmin.php"><i class="fa fa-check-square-o"></i><span>Manage Sub-Admin</span></a>
							</li>
							
							<li class="<?php if($pageName=='customer-list'){?>active<?php }?>">
								<a href="customer-list.php"><i class="fa fa-user-circle-o"></i><span>Customers List</span></a>
							</li>
							
							<li class="<?php if($pageName=='feedback_list'){?>active<?php }?>">
								<a href="feedback_list.php"><i class="fa fa-hospital-o"></i><span>Feedback List</span></a>
							</li>
							
							
							<li class="treeview <?php if($pageName=='brand_add' || $pageName=='brand_list'){?>active<?php }?>">
								<a href="javascript:;" >
									<i class="fa fa-user-md"></i><span>Brand</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($pageName=='brand_add'){?>active<?php }?>"><a href="brand_add.php">Add Brand</a></li>
									<li class="<?php if($pageName=='brand_list'){?>active<?php }?>"><a href="brand_list.php">List Brand</a></li>
									
								</ul>
							</li>							
						  
							<li class="treeview <?php if($pageName=='model_add' || $pageName=='model_list'){?>active<?php }?>">
								<a href="#">
									<i class="fa fa-list-alt"></i> <span>Model</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($pageName=='model_add'){?>active<?php }?>"><a href="model_add.php">Add Model</a></li>
									<li class="<?php if($pageName=='model_list'){?>active<?php }?>"><a href="model_list.php">List Model</a></li>
									
								</ul>
							</li>
							<li class="treeview <?php if($pageName=='issues_add' || $pageName=='issues_list'){?>active<?php }?>">
								<a href="#">
									<i class="fa fa-sitemap"></i><span>Issues</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($pageName=='issues_add'){?>active<?php }?>"><a href="issues_add.php">Add Issues</a></li>
									<li class="<?php if($pageName=='issues_list'){?>active<?php }?>"><a href="issues_list.php">List Issues</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<i class="fa fa-window-maximize"></i><span>Banner</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li><a href="add_images.php">Add Banner</a></li>
									<li><a href="list_images.php">List Banner</a></li>
								</ul>
							</li>
							
							<li class="treeview <?php if($pageName=='seo_add' || $pageName=='seo_list'){?>active<?php }?>">
								<a href="#">
									<i class="fa fa-sitemap"></i><span>SEO - Keywords</span>
									<span class="pull-right-container">
										<i class="fa fa-angle-left pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<li class="<?php if($pageName=='seo_add'){?>active<?php }?>"><a href="seo_add.php">Add Keywords</a></li>
									<li class="<?php if($pageName=='seo_list'){?>active<?php }?>"><a href="seo_list.php">List Keywords</a></li>
								</ul>
							</li>
							
							<?php 
						}
						?>
						
					</ul>
				</div> <!-- /.sidebar -->
			</aside>
            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="padding-top:50px;">
                    <div class="header-title">
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="index.php"><i class="pe-7s-home"></i> Home</a></li>
                            <!-- <li class="active">Dashboard</li> -->
                        </ol>
                    </div>
                </section>
				
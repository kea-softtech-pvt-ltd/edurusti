<?php

include_once('includes/application_top_no_login.php');

?>





<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title> eDurusti Admin panel</title>



    <!-- Favicon and touch icons -->

    <link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">

    

    <!-- Bootstrap -->

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap rtl -->

    <!--<link href="assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>-->

    <!-- Pe-icon-7-stroke -->

    <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>

    <!-- style css -->

    <link href="assets/dist/css/stylehealth.min.css" rel="stylesheet" type="text/css"/>

    <!-- Theme style rtl -->

    <!--<link href="assets/dist/css/stylehealth-rtl.css" rel="stylesheet" type="text/css"/>-->

</head>

<body>

    <!-- Content Wrapper -->

    <div class="login-wrapper">

        

        <div class="container-center">

            <div class="panel panel-bd">

                <div class="panel-heading">

                    <div class="view-header">

                        <div class="header-icon">

                            <i class="pe-7s-unlock"></i>

                        </div>

                        <div class="header-title">

                            <h3>Login</h3>

                            <small><strong>Please enter your credentials to login.</strong></small>

                        </div>

                    </div>

                </div>

                <div class="panel-body">

					<div class="alert alert-danger" id="error_message" style="display:none;"></div>

					<form method="post" name="loginForm" id="loginForm">

					<div class="form-group">

						<label class="control-label" for="username">Mobile Number</label>

						<input type="text" placeholder="Mobile Number" autocomplete="off" title="Please enter mobile number" required="" value="" name="username" id="username" class="form-control"/>

						<div id="email_error" style="color:#FF0000">

						</div>

						<span class="help-block small">Your Mobile Number</span>

					</div>

					<div class="form-group">

						<label class="control-label" for="password">Password</label>

						<input type="password" title="Please enter your password" autocomplete="off" placeholder="******" required="" value="" name="password" id="password" class="form-control" />

						<div id="password_error" style="color:#FF0000">

						</div>

						<span class="help-block small">Your password</span>

					</div>

					<div>

						<span class="btn btn-primary" onclick="validateForm();">Login</span>

						<!--a  href="password.php" class="btn btn-warning">Forgot Password</a-->

						<!--a class="btn btn-warning" href="register.html">Register</a-->

					</div>

					</form>

                </div>

            </div>

        </div>

    </div>

    <!-- /.content-wrapper -->

    <!-- jQuery -->

    <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>

    <!-- bootstrap js -->

    <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>





<script src="js/index.js" type="text/javascript"></script>
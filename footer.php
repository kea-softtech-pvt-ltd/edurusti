	<!-- footer area -->
	<footer class="footer-section" style="padding:0px;">
		<div class="container">
			<div class="footer-bottom text-left">
				<div class="text" style="margin-left: 30px;">
					<span>eDurusti</span> © copy  2019 All Right Reserved 
					<?php
					if(!$isLoggedIn) 	
					{		
						?>	
						<!--a href="javascript:void(0);" class="f-r" onclick="loginModal();"> <i class="fa fa-user"></i> Book Repair </a-->		
						<a href="placeorder" class="f-r"> <i class="fa fa-user"></i> Book Repair </a>		
						<?php	
					}
					else
					{
						?>	
						<a href="placeorder" class="f-r"> <i class="fa fa-calendar"></i> Book Repair </a>		
						<?php
					}
					?>
				</div>
				
			</div>
		</div>
		
	</footer>
	<!-- footer area end -->
    
	</div>
	<!--End pagewrapper-->

	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>
	
	<!-- Login Modal -->
	<div class="modal fade" id="loginModal" role="dialog" style="color:#000;">
	
		<div class="modal-dialog">
		
		  <!-- Modal content-->
		  <div class="modal-content">
		  
			<div class="modal-header" style="background-color: #4d4d4d;">
			
				<a href="javascript:void(0);" onclick="$('#loginModal').modal('hide');" class="pull-right" style="color:#fff;clear:both;"><i class="fa fa-times"></i></a>
				<h4 class="modal-title" style="color:#fff;width:80%;"><b>Book Repair</b></h4>
				
			</div>
			
			<div class="modal-body">
			
				<div style="padding: 0px 15px;">	
				
					<form id="mobile_login" name="login_form" action="" class="default-form" onsubmit="return check_login();" method="post">	
						
						<h3>Want to schedule a repair</h3>
						<div class="error" style="display:none;" id="login_error"></div>
						<label for="mobile-number">Mobile Number</label>
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input type="tel" maxlength="10" class="form-control" name="mobile_number" id="mobile_number_login" pattern="[0-9]{10}" value="" placeholder="Your Mobile Number" required>
						</div>

						<label for="password">Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" placeholder="Your Password" maxlength="16" name="password" id="password_login" required>
						</div>
						
						<div class="m-t-20">
							<input type="hidden" name="action" value="check_login">
							<input type="submit" class="btn btn-primary pull-right" name="loginForm" value="Login">
							<span><a href="javascript:void(0);" onclick="forgotPassWord()">Forgot Password?</a></span>
						</div>
						<div class="m-t-20">
							<p>Create an account? <a href="javascript:void(0);" onclick="createAccount();" style="color:green;">Register</a></p>
						</div>
					</form>
				
					<form id="mobile_register" name="register_form" onsubmit="return register_customer();" class="default-form" action="" method="post" style="display:none;">	
						
						<h3>Create an account</h3>
						<div class="error" style="display:none;" id="register_customer_error"></div>
						<label for="full-name">Full Name</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" class="form-control" placeholder="Your Full Name" id="full_name_register" name="full_name" maxlength="100" required>
						</div>

						<label for="mobile-number">Mobile Number</label>
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input type="tel" maxlength="10" class="form-control" name="mobile_number_register" id="mobile_number_register" pattern="[0-9]{10}" value="" placeholder="Your Mobile Number" required>
						</div>

						<label for="password">Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" placeholder="Your Password" maxlength="16" id="password_register" name="password" required>
						</div>
						
						<!--p>By creating an account you agree to our <a href="javascript:void(0);">Terms & Privacy</a>.</p-->
						
						<div class="m-t-20">
							<input type="hidden" name="action" value="register_customer">
							<button type="submit" class="btn btn-primary pull-right">Register</button>
							<span>Already have an account? <a href="javascript:void(0);" onclick="signIn();">Login</a></span>
						</div>

					</form>
				
					<form id="mobile_repair" name="forgotPassWord_form" class="default-form" action="" method="post" style="display:none;">
						
						<h3>Forgot Password</h3>
						<div class="error" style="display:none;" id="forgot_password_error"></div>
						<label for="mobile-number">Mobile Number</label>
						<div class="input-group">
							<span class="input-group-addon">+91</span>
							<input type="tel" maxlength="10" class="form-control" name="mobile_number_forgot" id="mobile_number_forgot" pattern="[0-9]{10}" value="" placeholder="Your Mobile Number" required>
						</div>
						<span id="error_form_name" class="error" style="display:none;">Please enter your mobile number.</span>
						<span class="error regi_user_phone"></span>
						
						<div class="m-t-20">
							<button type="button" class="btn btn-primary pull-right" onclick="generate_otp();">Submit</button>
							<span>Schedule a repair? <a href="javascript:void(0);" onclick="signIn();">Login</a></span>
						</div>
						
					</form>
					
					<form id="mobile_password" name="password_form" onsubmit="return reset_password_customer();" class="default-form" action="" method="post" style="display:none;">
						
						<h3>Reset Password</h3>
						<div class="error" style="display:none;" id="reset_password_error"></div>
						<label for="password">Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" placeholder="Your Password" maxlength="16" name="reset_password" id="reset_password" required>
						</div>
						
						<label for="re-password">Confirm Password</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" class="form-control" placeholder="Your Confirm Password" maxlength="16" name="confirm_password" id="confirm_password" required>
						</div>
						
						<div class="m-t-20">
							<input type="hidden" name="cust_id" id="cust_id" value="0">
							<input type="hidden" name="action" value="reset_password">
							<button type="submit" class="btn btn-primary pull-right">Reset</button>
							<span>Schedule a repair? <a href="javascript:void(0);" onclick="signIn();">Login</a></span>
						</div>
						
					</form>

					<form id="otp_repair" name="contact_form" class="default-form" action="" method="post" style="display:none;">
	
						<h3>Verify Mobile Number</h3>
	
						<label for="otp">OTP</label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
							<input type="text" name="otp_numer" id="otp_numer" maxlength="6" value="" class="form-control" autocomplete="off" placeholder="Enter OTP" required="">
						</div>

						<span id="error_otp_numer" class="error" style="display:none;">Please enter OTP.</span>

						<span id="invalid_otp_numer" class="error" style="display:none;"></span>

						<span class="error error2" style="display: none">* Input digits (0 - 9)</span>
						
						<div class="m-t-20">
							<input type="hidden" name="type" id="type" value="0">
							<input type="hidden" name="mobile_number_otp" id="mobile_number_otp" value="0">
							<button type="button" class="btn btn-primary pull-right" style="clear: both;" onclick="verify_otp();">Verify</button>
							<span><a href="javascript:void(0);" onclick="resend_otp();">Resend OTP</a></span>
						</div>
						
						<div class="m-t-20">
							<p>Schedule a repair? <a href="javascript:void(0);" onclick="signIn();">Login</a></p>
						</div>
						
					</form>
				
				</div>
				
			</div>
			
		  </div>
		  
		</div>
		
	</div>

	<!--End Google Map APi-->
	<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
	<span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=WtcfgvlJiK939kMuE55jkV9TZHWwRPy9bQqDDW5StGSsgxZ9WXgVhFkq76B6"></script></span>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	
	<script src="js/owl.js"></script>
	<!--script src="js/owl.carousel.min.js"></script-->
	
	<script src="js/script.js"></script>
	<!-- End of .page_wrapper -->
	
	</body>
	
</html>

<script>

function loginModal()
{
	$('#loginModal').modal('show');
}

function createAccount()
{
	$('#mobile_login').hide();
	$('#mobile_register').show();
	$('#full_name_register, #password_register, #mobile_number_register').val('');
}

function signIn()
{
	$('#mobile_login').show();
	$('#mobile_register, #mobile_repair, #otp_repair, #mobile_password').hide();
	$('#mobile_number_login, #password_login').val('');
}

function forgotPassWord()
{
	$('#mobile_login, #mobile_repair, #otp_repair, #mobile_password').hide();
	$('#mobile_repair').show();
	$('#mobile_number_forgot').val('');
}

function check_login()
{
	$.ajax({

		type :"POST",

		url: "ajax/ajax.login.php",				

		data: $('#mobile_login').serialize(),

		success: function(data){

			var obj = JSON.parse(data);

			$('#login_error').hide().html('');
			
			if(obj.status == '1')
			{
				window.location="placeorder";
			}
			else
			{
				$('#login_error').show().html('Invalid mobile number and password.');
			}
			
			setTimeout(function(){ $('#login_error').hide().html(''); }, 3000);
		}

	});	
	return false;
}

function register_customer()
{	
	$.ajax({

		type :"POST",

		url: "ajax/ajax.login.php",				

		data: $('#mobile_register').serialize(),

		success: function(data){

			var obj = JSON.parse(data);
			
			$('#register_customer_error').hide().html('');
			
			if(obj.status == '1')
			{
				//alert(obj.otp);
				$('#type').val('register');
				$('#mobile_number_otp').val($('#mobile_number_register').val());
				$('#mobile_register').hide();
				$('#otp_repair').show();
				$('#otp_numer').val('');
			}
			else if(obj.status == '2')
			{
				$('#register_customer_error').show().html('Mobile number already register.');
			}
			else
			{
				$('#register_customer_error').show().html('Error occured. Please try again.');
			}
			
			setTimeout(function(){ $('#register_customer_error').hide().html(''); }, 3000);
			
		}

	});	
	return false;
}

function reset_password_customer()
{	
	if($('#reset_password').val() != $('#confirm_password').val())
	{
		$('#reset_password_error').show().html('Password and confirm password not matched.');
		setTimeout(function(){ $('#reset_password_error').hide().html(''); }, 3000);
	}
	else
	{	
		$.ajax({ 

			type :"POST",

			url: "ajax/ajax.login.php",				

			data: $('#mobile_password').serialize(),

			success: function(data){

				var obj = JSON.parse(data);

				$('#reset_password_error').hide().html('');
				
				if(obj.status == '1')
				{
					window.location="dashboard";
				}
				else
				{
					$('#reset_password_error').show().html('Error occured. Please try again.');
				}
				
				setTimeout(function(){ $('#reset_password_error').hide().html(''); }, 3000);
			}

		});	
	}
	return false;
}

function resend_otp()
{
	var mobile = $('#mobile_number_otp').val();

	$.ajax({

		type :"POST",

		url: "ajax/ajax.login.php",				

		data:"mobile="+mobile+"&action=otp",

		success: function(data){

			var obj = JSON.parse(data);

			if(obj.message.trim()=='success')
			{
				//alert(obj.otp);
			}		

		}

	});	
}

$(document).ready(function() {

	$(".only-no").bind("keypress", function (e) {

		var keyCode = e.which ? e.which : e.keyCode

		if (!(keyCode >= 48 && keyCode <= 57)) {

			$(".error1").css("display", "inline");

			return false;

		}else{

			$(".error1").css("display", "none");

		}

	});

	$(".only-no-otp").bind("keypress", function (e) {

		var keyCode = e.which ? e.which : e.keyCode

		if (!(keyCode >= 48 && keyCode <= 57)) {

			$(".error2").css("display", "inline");

			return false;

		}else{

			$(".error2").css("display", "none");

		}

	});

});
 

function generate_otp()

{
	var mobile = $('#mobile_number_forgot').val();
	
	if(mobile.trim()=='')

	{

		$('#error_form_name').show();

		setTimeout(function(){ $('#error_form_name').hide(); }, 3000);

		return false;

	}

	else if (mobile.length > 10 || mobile.length < 10)

	{

		$('span.regi_user_phone').html('Please enter a valid mobile number.');

	} 

	else

	{

		$.ajax({

			type :"POST",

			url: "ajax/ajax.login.php",				

			data:"mobile="+mobile+"&action=otp",

			success: function(data){

				var obj = JSON.parse(data);

				if(obj.message.trim()=='success')
				{
					$('#mobile_repair').hide();
					$('#otp_repair').show();
					$('#otp_numer').val('');
					//alert(obj.otp);
					$('#type').val('forgot');
					$('#cust_id').val(obj.cust_id);
					$('#mobile_number_otp').val($('#mobile_number_forgot').val());
					$('#otp_verify').val(data);
				}
				else
				{
					$('#forgot_password_error').show().html('Invalid mobile number.');

					setTimeout(function(){ $('#forgot_password_error').hide(); }, 3000);
				}			

			}

		});	

	}

}



function verify_otp()

{

	var _type = $('#type').val();
	
	var mobile=$('#mobile_number_otp').val();
	
	var otp_numer=$('#otp_numer').val();

	$("#invalid_otp_numer").hide();

	if(otp_numer.trim()=='')

	{

		$('#error_otp_numer').show();

		setTimeout(function(){ $('#error_otp_numer').hide(); }, 3000);

		return false;

	}

	else

	{

		$.ajax({

			type :"POST",

			url: "ajax/ajax.login.php",				

			data:"mobile="+mobile+"&otp_numer="+otp_numer+"&action=verify_otp&type="+_type,

			success: function(data){

				var obj = JSON.parse(data);
				
				$("#invalid_otp_numer").hide();

				if(obj.message.trim()=='success')

				{
					if(_type=='register')
						window.location = 'dashboard';
					else 
					{						
						$('#otp_repair').hide();
						$('#mobile_password').show();
						$('#reset_password, #confirm_password').val('');
					}
				}

				else

				{

					$("#invalid_otp_numer").show().html('Invalid OTP.');

				} 
				
				setTimeout(function(){ $("#invalid_otp_numer").hide(); }, 3000);

			}

		});		

	}

	

}



function schedule_repair()

{

	$('#otp_repair').hide();

	$('#mobile_repair').show();

}

</script>
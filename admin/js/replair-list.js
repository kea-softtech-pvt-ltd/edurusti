$(document).ready(function() {
    $('#example').DataTable({
        "order": [[ 0, "desc" ]]
    });
	$("#example_wrapper").css("width","100%");
});

function order_cancel_edurusti(order_id) {
	$('#order_id_concel').val(order_id);
}

function cancel_validateForm() {
	var _invalid = false;
	var description = $('#description').val();
	var order_id_concel = $('#order_id_concel').val();
	if (description == "") {
		$('#description_error').show();
		$('#description_error').html('Please enter description.');
		setTimeout(function () {
			$('#description_error').hide();
		}, 3000);
		_invalid = true;
	}
	if (!_invalid) {
		$.ajax({
			url: "ajax/ajax_repair.php",
			type: "POST",
			data: {
				action: 'cancel_order',
				description: description,
				order_id_concel: order_id_concel
			},
			success: function (result) {
				if ($.trim(result) == 'success') {
					window.location.href = 'repair-list.php';
				}
			}
		});
	}
}			
function view(id)
{        
	$.ajax({
		url: "ajax/ajax_repair.php", 
		type: "POST",
		data: { id : id ,action : 'view_logo'},//to pass the value on another page 
		success: function(result)
		{
		//alert(1);
		//window.location.href='logo-list.php'
		$('#profile').html(result);
		}	
	});
}
function getData(id,track_id)
{
	$.ajax({
		url: "ajax/ajax_repair.php", //for data update to database" ajax_logo.php
		type: "POST",
		data: { id : id,action : 'edit_',order_id:track_id, },//to pass the value on another page 
		success: function(result)
		{
		//alert(result);
		$('#profile_data').html(result);
		}	
	});
}
function track_form_val(){

var cust_id=$('#cust_id').val();
var order_id=$('#order_id').val();
var track_status=$('#track_status').val();
var track_description=$('#track_description').val();
var track=$('#track').val();
   $.ajax({
		url: "ajax/ajax_repair.php", //for data update to database" ajax_logo.php
		type: "POST",
		data: { action : 'add_track',cust_id:cust_id,order_id:order_id,track:track,track_status:track_status, track_description:track_description },//to pass the value on another page 
		success: function(result)
		{
		   if($.trim(result)=='success')
			{
				window.location.href = 'repair-list.php';
			}
		}	
	});
	    /* var formData = new FormData($('#track_form')[0]);
		formData.append('action', 'add_track');
			//alert(1);
	 
		$.ajax({
			url: "ajax/ajax_repair.php", //for data insertion to database"
			type: "POST",
			data: formData,
			success: function(result){
				alert(result)
			if($.trim(result)=='success')
			{
				window.location.href = 'repair-list.php';
			}
			}	
		}); */
	
}

function verify_otp_delivery()
{
	var cust_id=$('#cust_id').val();
	var order_id=$('#order_id').val();
	var otp_number=$('#otp_number').val();
	var status_type=$('#status_type').val();
	
	if(otp_number.trim()=='')

	{

		$('#error_otp_numer').show();

		setTimeout(function(){ $('#error_otp_numer').hide(); }, 3000);

		return false;

	}

	else

	{
	
		$.ajax({
			url: "ajax/ajax_repair.php", //for data update to database" ajax_logo.php
			type: "POST",
			data: { action : 'verify_otp_delivery',cust_id:cust_id,order_id:order_id,otp_number:otp_number,status_type:status_type },//to pass the value on another page 
			success: function(result)
			{
				$("#invalid_otp_numer").hide();
				
				if($.trim(result)=='success')
				{
					//window.location.href = 'deliver_order.php';
					window.location.reload();
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


function generateOTP(id,track_id,status_type)
{
	$.ajax({
		url: "ajax/ajax_repair.php", //for data update to database" ajax_logo.php
		type: "POST",
		data: { id : id,action : 'generateOTP',order_id:track_id,status_type:status_type },//to pass the value on another page 
		success: function(result)
		{
		//alert(result);
		$('#profile_data').html(result);
		}	
	});
}

//document.getElementById("dashboard_dash").innerHTML = "Logo";
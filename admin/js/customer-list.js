$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});


function view(id)
{        
	$.ajax({
		url: "ajax/ajax_customer.php", 
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
		url: "ajax/ajax_customer.php", //for data update to database" ajax_logo.php
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
var track=$('#track').val();
   $.ajax({
		url: "ajax/ajax_customer.php", //for data update to database" ajax_logo.php
		type: "POST",
		data: { action : 'add_track',cust_id:cust_id,order_id:order_id,track:track, },//to pass the value on another page 
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
			url: "ajax/ajax_customer.php", //for data insertion to database"
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

//document.getElementById("dashboard_dash").innerHTML = "Logo";
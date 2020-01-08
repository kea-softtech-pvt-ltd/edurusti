function validateForm() 
{
	
	var _invalid = false;
	
	//validation check for fileds
	var _cate_name = $('#cate_name').val();

	
	if(_cate_name=="")
	{
		$('#cate_name_error').show();
		$('#cate_name_error').html('Please enter brand name');
		setTimeout(function(){ $('#cate_name_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	if(!_invalid)
	{
		var formData = new FormData($('#registration')[0]);
		formData.append('action', 'add_cate');
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				if($.trim(result)=='success')
				{
					window.location.href = 'brand_list.php';
				}
			}	
		});
	}
}


function validateForm_update() 
{
	
	var _invalid = false;
	
	//validation check for fileds
	var _cate_name = $('#cate_name').val();

	
	if(_cate_name=="")
	{
		$('#cate_name_error').show();
		$('#cate_name_error').html('Please enter brand name');
		setTimeout(function(){ $('#cate_name_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	if(!_invalid)
	{
		var formData = new FormData($('#brand')[0]);
		formData.append('action', 'update');
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
				if($.trim(result)=='success')
				{
					window.location.href = 'brand_list.php';
				}
			}	
		});
	}
}
function IsEmail(email) 
{
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!regex.test(email))
		{
		return false;
		}
		else
		{
		return true;
		}
}

$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});







function activeDeactive(brand_id,status)
{
	//alert(brand_id);

	$.ajax({
		url: "ajax/ajax_mobile_repair.php",
		type: "POST",
		data: { id : brand_id, status: status, action:'active_deactive_cate' },//to pass the value on another page 		
		cache: false,		
		success: function(result){
		
			if($.trim(result)=='success')
			window.location.href = 'brand_list.php';
		}	
	});
}

function confirmation(brand_id)
{
	//alert(brand_id);
	if(confirm("Are you sure you want to delete this record?"))
	{	
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", 
			type: "POST",
			data: { id : brand_id, action:'delete_cate' },//to pass the value on another page 
			success: function(result){
				if($.trim(result)=='success')			
					window.location.href = 'brand_list.php';	
			}	
		});
    }
}

function getData(brand_id)
{
	$.ajax({
		url: "ajax/ajax_mobile_repair.php",  //for data update to database"
		type: "POST",
		data: { id : brand_id, action:'update_cate'},//to pass the value on another page 
		success: function(result){
			//alert(result);
			$('#cate_data').html(result);
		}	
	});
}
function validateForm_update()
{
	var _invalid = false;
	var brand_id=$('#brand_id').val();
	//validation check for fileds
	var _cate_name = $('#cate_name').val();
	if(_cate_name=="")
	{
		$('#cate_name_error').show();
		$('#cate_name_error').html('Please enter brand name');
		setTimeout(function(){ $('#cate_name_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	if(!_invalid)
	{
	$.ajax({
		url: "ajax/ajax_mobile_repair.php",  //for data update to database"
		type: "POST",
		data: { id : brand_id,cate_name : _cate_name, action:'update_cate_insert'},//to pass the value on another page 
		success: function(result){
			if($.trim(result)=='success')			
					window.location.href = 'brand_list.php';	
			}		
	});
  }
}
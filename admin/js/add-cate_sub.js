// Form validation code will come here.
function validateForm() 
{
	var _invalid = false;
	var _cate_add = $('#cate_add').val();
	var _cate_sub = $('#add_cate_sub').val();

	
	if(_cate_add=="")
	{
		$('#cate_add_error').show();
		$('#cate_add_error').html('Please select brand');
		setTimeout(function(){ $('#cate_add_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_cate_sub=="")
	{
		$('#cate_sub_error').show();
		$('#cate_sub_error').html('Please enter model name');
		setTimeout(function(){ $('#cate_sub_error').hide(); }, 3000);
		_invalid = true;
	}
	if(!_invalid)
	{
	$.ajax({
		url: "ajax/ajax_sub_cate.php",  //for data update to database"
		type: "POST",
		data: { sub_cate_name : _cate_sub, action:'model_exit', brand_id : _cate_add },//to pass the value on another page 
		success: function(result){
          if(result.trim()=='1'){
				$('#cate_sub_error').show();
				$('#cate_sub_error').html('Model name already exit.');
				setTimeout(function(){ $('#cate_sub_error').hide(); }, 3000);
				return false;
		  }
		  else {
					var formData = new FormData($('#sub_cate_data')[0]);
					formData.append('action', '_addcate_sub');
					$.ajax({
						url: "ajax/ajax_sub_cate.php", //for data insertion to database"
						type: "POST",
						data: formData,
						cache: false,
						contentType: false,			
						processData: false,			
						success: function(result){
						if($.trim(result)=='success')
							window.location.href='model_list.php'
						}
					});
			}	
		}		
	});
	}
	
	/* if(!_invalid)
	{
		var formData = new FormData($('#sub_cate_data')[0]);
		formData.append('action', '_addcate_sub');
		$.ajax({
			url: "ajax/ajax_sub_cate.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,			
			processData: false,			
			success: function(result){
			if($.trim(result)=='success')
				window.location.href='model_list.php'
			}
		});
	} */
}
function validateForm_update() 
{
	//alert(1)
	var _invalid = false;
	var sub_category_id = $('#sub_category_id').val()
	;var _cate_add = $('#cate_add').val();
	var _cate_sub = $('#add_cate_sub').val();

	
	if(_cate_add=="")
	{
		$('#cate_add_error').show();
		$('#cate_add_error').html('Please select brand');
		setTimeout(function(){ $('#cate_add_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_cate_sub=="")
	{
		$('#cate_sub_error').show();
		$('#cate_sub_error').html('Please enter model name');
		setTimeout(function(){ $('#cate_sub_error').hide(); }, 3000);
		_invalid = true;
	}
	
	
	if(!_invalid)
	{
		//var sub_category_id=$('#sub_category_id').val();
			$.ajax({
		url: "ajax/ajax_sub_cate.php",  //for data update to database"
		type: "POST",
		data: { sub_category_id : sub_category_id,sub_cate_name : _cate_sub, action:'model_exit_edit',brand_id:_cate_add},//to pass the value on another page 
		success: function(result){
          if(result.trim()=='1'){
				$('#cate_sub_error').show();
				$('#cate_sub_error').html('Model name already exit.');
				setTimeout(function(){ $('#cate_sub_error').hide(); }, 3000);
				return false;
		  }
		  else {
				$.ajax({
				url: "ajax/ajax_sub_cate.php", //for data update to database"
				type: "POST",
				data: { sub_category_id : sub_category_id,action : 'update_sub_category',cate_add : _cate_add,add_cate_sub :_cate_sub },//to pass the value on another page 
				success: function(result)
				{
					if($.trim(result)=='success'){
						window.location.href='model_list.php'
					}
				}	
			   });
			}	
		}		
	});
		/* $.ajax({
		url: "ajax/ajax_sub_cate.php", //for data update to database"
		type: "POST",
		data: { sub_category_id : sub_category_id,action : 'update_sub_category',cate_add : _cate_add,add_cate_sub :_cate_sub },//to pass the value on another page 
		success: function(result)
		{
		    if($.trim(result)=='success'){
				window.location.href='model_list.php'
			}
		}	
	   }); */
	}
}
function getData(id)
{
	
	$.ajax({
		url: "ajax/ajax_sub_cate.php", //for data update to database"
		type: "POST",
		data: { id : id,action : 'edit_model' },//to pass the value on another page 
		success: function(result)
		{
		//alert(result);
		$('#profile_data').html(result);
		}	
	});
}
function confirmation(model_id)
{
	//alert(model_id);
	var result = confirm("Are you sure to delete this record?");
	if(result){
	$.ajax({
	url: "ajax/ajax_sub_cate.php", //for data insertion to database"
	type: "POST",
	data: { id : model_id,action : 'delete_model' },//to pass the value on another page 
	success: function(result)
	{
	//alert(result);
	if($.trim(result)=='success')
	{
	window.location.href='model_list.php'
	}


	}	
	});
	}
}

$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});
// document.getElementById("dashboard_dash").innerHTML = "Schedule";
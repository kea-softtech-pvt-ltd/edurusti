// Form validation code will come here.
function validateForm() 
{
	var _invalid = false;
	var _keywords_name = $('#keywords_name').val();
	var _keywords_desc = $('#keywords_desc').val();
	
	if(_keywords_name=="")
	{
		$('#keywords_name_error').show();
		$('#keywords_name_error').html('Please enter keywords');
		setTimeout(function(){ $('#keywords_name_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_keywords_desc=="")
	{
		$('#keywords_desc_error').show();
		$('#keywords_desc_error').html('Please enter keywords description');
		setTimeout(function(){ $('#keywords_desc_error').hide(); }, 3000);
		_invalid = true;
	}
				
	var formData = new FormData($('#keywords-description-data')[0]);
	formData.append('action', 'add_keywords');	
	if(!_invalid)
	{
		$('#keywords_name_error').hide();
		$('#keywords_desc_error').hide();
		$.ajax({
			url: "ajax/ajax_keywords.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,			
			processData: false,			
			success: function(result){
				
				if($.trim(result)=='success')
					window.location.href='seo_list.php'
				else if($.trim(result)=='exit')
				{
					$('#keywords_desc_error').show();
				}
					
			}
		});
	}
}

// Form validation code will come here.
function update_issues() 
{
	
	var _invalid = false;
	var issues_id = $('#issues_id').val();
	var _issue_desc = $('#issue_desc').val();
	var _price = $('#price').val();
	
	if(_issue_desc=="")
	{
		$('#issue_desc_error').show();
		$('#issue_desc_error').html('Please enter Issue description');
		setTimeout(function(){ $('#issue_desc_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_price=="")
	{
		$('#price_error').show();
		$('#price_error').html('Please enter Price');
		setTimeout(function(){ $('#price_error').hide(); }, 3000);
		_invalid = true;
	}	
	//alert(1)
	if(!_invalid)
	{
		
		$.ajax({
		url: "ajax/ajax_issue_desc.php", //for data update to database"
		type: "POST",
		data: { issue_desc : _issue_desc,action : 'update_issues',price : _price,id :issues_id },//to pass the value on another page 
		success: function(result)
		{
			//alert(result)
		    if($.trim(result)=='success'){
				window.location.href='issues_list.php'
			}
			else if($.trim(result)=='exit')
			{
				$('#issue_desc_error_update').show();
			}
		}	
	   });
	}
}
$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});

function change_status(id, is_active)
{
	//alert(id)
	$.ajax({
		url: "ajax/ajax_keywords.php", //for data update to database"
		type: "POST",
		data: { id : id, action : 'change_status', is_active : is_active },//to pass the value on another page 
		success: function(result)
		{
			window.location.reload();
		}	
	});
}
function confirmation(_id)
{
	//alert(model_id);
	var result = confirm("Are you sure to delete this record?");
	if(result){
	$.ajax({
	url: "ajax/ajax_keywords.php", //for data insertion to database"
	type: "POST",
	data: { id : _id, action : 'delete_keywords' },//to pass the value on another page 
	success: function(result)
	{
	//alert(result);
	if($.trim(result)=='success')
	{
	window.location.href='seo_list.php'
	}


	}	
	});
	}
}
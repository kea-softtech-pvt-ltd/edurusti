function validateForm1() 
{
	
	
	var _invalid = false;
	//validation check for fileds
	var _picture = $('#picture').val();
	var _title = $('#title').val();
	var _description = $('#description').val();

	if(_picture=="")
	{
		$('#picture_error').show();
		$('#picture_error').html('Please enter picture');
		setTimeout(function(){ $('#picture_error').hide(); }, 3000);
		_invalid = true;
	}

	if(_title=="")
	{
		$('#_title_error').show();
		$('#_title_error').html('Please enter title');
		setTimeout(function(){ $('#_title_error').hide(); }, 3000);
		_invalid = true;
	}
	if(_description=="")
	{
		$('#description_error').show();
		$('#description_error').html('Please enter description');
		setTimeout(function(){ $('#description_error').hide(); }, 3000);
		_invalid = true;
	}

	if(!_invalid)
	{
		
		var formData = new FormData($('#registration')[0]);
		formData.append('action', 'add_logo');
		
		$.ajax({
			url: "ajax/ajax_logo.php", //for data insertion to database"
			type: "POST",
			data: formData,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success: function(result){
			if($.trim(result)=='success')
			{
				window.location.href = 'list_images.php';
			}
			}	
		});
	} 
}
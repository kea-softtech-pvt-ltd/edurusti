

$(document).ready(function() {
    $('#example').DataTable();
	$("#example_wrapper").css("width","100%");
});


function active_deactive_feedback(_id,_status)
{
	$.ajax({
		url: "ajax/ajax_mobile_repair.php",
		type: "POST",
		data: { id : _id, feedback_status: _status, action:'active_deactive_feedback' },//to pass the value on another page 		
		cache: false,		
		success: function(result){
		
			if($.trim(result)=='success')
			window.location.href = 'feedback_list.php';
		}	
	});
}

function delete_feedback(_id)
{
	//alert(_id);
	if(confirm("Are you sure you want to delete this record?"))
	{	
		$.ajax({
			url: "ajax/ajax_mobile_repair.php", 
			type: "POST",
			data: { id : _id, action:'delete_feedback' },//to pass the value on another page 
			success: function(result){
				if($.trim(result)=='success')			
					window.location.href = 'feedback_list.php';	
			}	
		});
    }
}

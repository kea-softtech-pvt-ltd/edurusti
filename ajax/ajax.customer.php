<?php

include_once('../includes/application_top.php');

include_once('../class/class.customer.php');

$customer = new Customer($db);



if($_POST['action']=="setPersonalInformation")

{

	$data = Array(	

		'full_name' =>  $_POST['full_name'],	

		//'email' =>  $_POST['email'],

		//'pin_code' =>  $_POST['pin_code'],

		'address' =>  $_POST['address'],

		//'address1' =>  $_POST['address1'],

		//'landmark' =>  $_POST['landmark'],

		//'city' =>  $_POST['city']

	);

	$result = $customer->setPersonalInformation($data,$_SESSION['cust_id']);

	if($result)

	{	

		$response['status'] = '1'; 

		$response['message'] = 'success'; 

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error'; 

	}

}



if($_POST['action']=="setOrder")

{	

	$personal_info = Array(	

		'full_name' =>  $_POST['full_name'],	

		//'email' =>  $_POST['email'],

		//'pin_code' =>  $_POST['pin_code'],

		'address' =>  $_POST['address'],

		//'address1' =>  $_POST['address1'],

		//'landmark' =>  $_POST['landmark'],

		//'city' =>  $_POST['city']

	);

	$customer->setPersonalInformation($personal_info,$_SESSION['cust_id']);

	

	$data = Array(	

		'cust_id' => $_SESSION['cust_id'],	

		'brand_id' => $_POST['brand_id'],

		'model' => $_POST['model'],

		'other_model' => $_POST['other_model'],

		'order_description' => '',

		'issues_id' => implode(',',$_POST['issues']),

		'issues_description' => '',

		'pickup_date_time' => $_POST['pickup_date_time']

	);

	$result = $customer->setOrder($data,$_SESSION['cust_id']);


	if($result)

	{

		$track = Array(	

			'cust_id' =>  $_SESSION['cust_id'],	

			'order_id' =>  $result,

			'status' =>  '1'

		);		

		$track_result = $customer->setTracking($track);

		if($track_result)

		{

			$response['status'] = '1'; 

			$response['message'] = 'success'; 

			$response['order_number'] = $result; 

		}

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error'; 

		$response['order_number'] = '0'; 

	}

}



if($_POST['action']=="getOrderTrackingStatus")

{	

	$order_number = $_POST['order_number'];

	$status = $customer->is_order_canecelled($order_number);
	
	if($status['status'] == '3')
	{	
		
		$response['status'] = '1'; 

		$response['message'] = 'cancelled'; 

		$response['result'] = $status; 
		
	}

	else

	{
		$result = $customer->getOrderTrackingStatus($order_number);

		if($result)

		{	

			$response['status'] = '1'; 

			$response['message'] = 'success'; 

			$response['result'] = $result; 
			
		}
	
		else

		{		
			$response['status'] = '0'; 

			$response['message'] = 'error'; 

			$response['result'] = '';
			
		}

	}

}



if($_POST['action']=="getModels")

{	

	$brand_id = $_POST['brand_id'];

	$result = $customer->getModels($brand_id);

	if($result)

	{	

		$response['status'] = '1'; 

		$response['message'] = 'success'; 

		$response['result'] = $result; 

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error'; 

		$response['result'] = '';

	}

}



if($_POST['action']=="deleteOrder")

{	

	$ord_id = $_POST['ord_id'];

	$result = $customer->deleteOrder($ord_id);

	if($result)

	{	

		$response['status'] = '1'; 

		$response['message'] = 'success';

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error';

	}

}



if($_POST['action']=="cancelOrder")

{	

	$ord_id = $_POST['ord_id'];

	$result = $customer->cancelOrder($ord_id);

	if($result)

	{	

		$response['status'] = '1'; 

		$response['message'] = 'success';

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error';

	}

}



if($_POST['action']=="getCancelOrderDetails")

{	

	$ord_id = $_POST['ord_id'];

	$result = $customer->getCancelOrderDetails($ord_id);

	if($result)

	{	
	
		$description = ($result['order_description']=='')?'Self Cancelled':'Admin cancelled due to '.$result['order_description'];

		$text = '<h3>Order Cancelled</h3><br/>

		<table class="table table-striped borderless">

			<tbody>

				<tr>

					<th>Order Number</th>

					<td>'.$result['order_number'].'</td>

				</tr>

				<tr>

					<th>Issues</th>

					<td>'.$result['issues'].'</td>

				</tr>

				<tr>

					<th>Cancel description</th>

					<td>'.$description.'</td>

				</tr>

			</tbody>

		</table>';



		$response['status'] = '1'; 

		$response['message'] = 'success';

		$response['text'] = $text;

	}

	else

	{

		$response['status'] = '0'; 

		$response['message'] = 'error';

	}

}

if($_POST['action']=='orderFeedback')
	
{
	$data = Array(	

		'feedback' =>  $_POST['feedback'],	

		'feedback_by' =>  $_SESSION['cust_id'],
		
		'order_id' =>  $_POST['order_id'],

		'status' =>  '0'

	);

	if($customer->orderFeedback($data))
		
	{
			
		$response['status'] = '1'; 

		$response['message'] = 'success';	
		
	}
	
	else
		
	{
		
		$response['status'] = '0'; 

		$response['message'] = 'error';
		
	}
	
}


echo json_encode($response);	

 

?>
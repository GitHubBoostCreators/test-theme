<?php
function top_five_posts() {
	$response = new \stdClass();
	$data = new \stdClass();

	
	if(isset($_GET['id'])):
		$data->status = 201;
	
		$response->code = 'rest_route';
		$response->message = 'Route gevonden die overeenkomt met de URL en aanvraagmethode.';
		$response->data = $data;
	else:
		$data->status = 404;
	
		$response->code = 'rest_no_route';
		$response->message = 'Geen route gevonden die overeenkomt met de URL en aanvraagmethode.';
		$response->data = $data;
	endif;
	
	
	return rest_ensure_response($response);
}
//{"code":"rest_no_route","message":"Geen route gevonden die overeenkomt met de URL en aanvraagmethode.","data":{"status":404}}
//{"code":"rest_no_route","message":"Geen route gevonden die overeenkomt met de URL en aanvraagmethode.","data":{"status":404}}
?>
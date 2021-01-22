<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'GET'){
		$body = file_get_contents('php://input');
		if (file_exists('../../../PotatoBot v3/images/'.strtolower(preg_replace('/\W/i', '', $headers['Category'])).'/'.strtolower(preg_replace('/\W/i', '', $body)).'.png')){
			$content = file_get_contents('../../../PotatoBot v3/images/'.strtolower(preg_replace('/\W/i', '', $headers['Category'])).'/'.strtolower(preg_replace('/\W/i', '', $body)).'.png');
			header('Content-Type: image/gif');
			echo $content;
			http_response_code(200);
		} else {
			http_response_code(404);
		}
	} else {
		http_response_code(405);
	}
?>
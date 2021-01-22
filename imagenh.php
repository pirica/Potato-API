<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'GET'){
		if (file_exists('../../../PotatoBot v3/images/'.strtolower(preg_replace('/\W/i', '', $_GET['category'])).'/'.strtolower(preg_replace('/\W/i', '', $_GET['name'])).'.png')){
			$content = file_get_contents('../../../PotatoBot v3/images/'.strtolower(preg_replace('/\W/i', '', $_GET['category'])).'/'.strtolower(preg_replace('/\W/i', '', $_GET['name'])).'.png');
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
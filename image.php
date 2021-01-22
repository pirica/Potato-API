<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'GET'){
		if (array_key_exists('Authorization', $headers)){
			if (strlen($headers['Authorization']) === 32){
				include 'authorized.php';
				if (in_array($headers['Authorization'], $authorizedUsers)){
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
					http_response_code(401);
					echo json_encode(['errorMessage' => 'Unauthorized. Please apply for authorization.']);
				}
			} else {
				http_response_code(401);
				echo json_encode(['errorMessage' => 'Invalid Authorization header']);
			}
		} else {
			http_response_code(401);
			echo json_encode(['errorMessage' => 'Missing Authorization header']);
		}
	} else {
		http_response_code(405);
	}
?>
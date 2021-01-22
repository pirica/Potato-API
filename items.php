<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'GET'){
		if (array_key_exists('Authorization', $headers)){
			if (strlen($headers['Authorization']) === 32){
				include 'authorized.php';
				if (in_array($headers['Authorization'], $authorizedUsers)){
					http_response_code(200);
					echo file_get_contents('../../../stw daily/items.json');
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
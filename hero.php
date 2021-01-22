<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'GET'){
		if (array_key_exists('Authorization', $headers)){
			if (strlen($headers['Authorization']) === 32){
				include 'authorized.php';
				if (in_array($headers['Authorization'], $authorizedUsers)){
					$heroesFile = json_decode(file_get_contents('../../../PotatoBot v3/data/heroes.json'));
					$body = file_get_contents('php://input');
					if (in_array($body, $heroesFile['list'])){
						http_response_code(200);
						echo json_encode($heroesFile['heroes'][$heroesFile['returns'][$body]]);
					} else {
						http_response_code(404);
						echo json_encode(['errorMessage' => 'Hero not found.']);
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
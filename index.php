<?php
	$headers = apache_request_headers();
	$method = $_SERVER['REQUEST_METHOD'];
	if ($method === 'POST'){
		if (array_key_exists('Authorization', $headers)){
			if (strlen($headers['Authorization']) === 32){
				$histFile = fopen('history/'.microtime().'-'.$headers['Authorization'].'.json', 'w');
				$data = [
					'Author' => $headers['Authorization'],
					'Category' => $headers['Category'],
					'Content' => file_get_contents('php://input')
				];
				fwrite($histFile, json_encode($data, JSON_PRETTY_PRINT));
				fclose($histFile);
				http_response_code(204);
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
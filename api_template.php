<?php
	/*
		HTTP Template by a.bakedpotato
		GitHub: a-bakedpotato
	*/

	$apiRoot = '/';
	function addEndpoint($method, $endpoint, $headers = [], $payload = null){
		global $apiRoot;
		echo '<p class="code"><span class="method">'.$method.'</span> <span class="url">'.$apiRoot.$endpoint.'</span> HTTP/1.1';
		foreach ($headers as $hTitle => $hValue){
			echo '<br><span class="header">'.$hTitle.'</span>: '.$hValue;
		}
		if ($payload){
			echo '<br><br>'.$payload;
		}
		echo '</p><hr>';
	}

	function setRoot($data){
		global $apiRoot;
		$apiRoot = $data;
	}
?>
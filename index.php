<html>
	<head>
		<title>a.bakedpotato's API</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<?php
			function addEndpoint($method, $endpoint, $headers, $payload = null){
				echo '<p class="code"><span class="method">'.$method.'</span> <span class="url">http://baked.potatoheads.net/api/'.$endpoint.'</span> HTTP/1.1';
				foreach ($headers as $hTitle => $hValue){
					echo '<br><span class="header">'.$hTitle.'</span>: '.$hValue;
				}
				if ($payload){
					echo '<br><br>'.$payload;
				}
				echo '</p><hr>';
			}

			echo '<h1>Send Information to Server</h1>This allows you to send information to me. If you wish to apply for authorization, use the category <span class="smallCode">application</span>. Response code should be <span class="smallCode">204</span> if successful.';
			addEndpoint('POST', 'post.php', [
				'Authorization' => '{epicAccountId}',
				'Category' => '{category}'
			], '{infoToSendToServer}');

			echo '<h1>Get hero information</h1>This will return json with information about a hero.<br>Bot: PotatoBot';
			addEndpoint('GET', 'hero.php', [
				'Authorization' => '{epicAccountId}',
				'Content-Type' => 'application/json'
			], '{heroName}');

			echo '<h1>Get an image</h1>This will return a png of any image. <span class="smallCode">imageCategory</span> must be an item from this list:<ul><li>backblings</li><li>banners</li><li>bundles</li><li>classes</li><li>contrails</li><li>emotes</li><li>emoticons</li><li>gliders</li><li>heroes</li><li>loading-screens</li><li>music</li><li>outfits</li><li>perks</li><li>pickaxes</li><li>resources</li><li>shop_bg</li><li>sprays</li><li>toys</li><li>weapons</li><li>wraps</li></ul>Bot: PotatoBot';
			addEndpoint('GET', 'image.php', [
				'Content-Type' => 'image/gif',
				'Category' => '{imageCategory}'
			], '{imageName}');

			echo '<h1>Get an image without headers</h1>This will return a png of any image. <span class="smallCode">imageCategory</span> must be an item from the previous list.<br>Bot: PotatoBot';
			addEndpoint('GET', 'imagenh.php?category={imageCategory}&name={imageName}', []);

			echo '<h1>Get User-Friendly names from a Template ID</h1>This will return a json object with template IDs as keys and their user-friendly names as values. Credit to <span class="smallCode">amrsatrio</span> for helping with turning this into a full list.<br>Bot: Fortnite Daily';
			addEndpoint('GET', 'items.php', [
				'Authorization' => '{epicAccountId}'
			]);
		?>
	</body>
</html>
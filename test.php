<?php

require_once 'php/testando_composer/vendor/autoload.php';

function getInsta() {
					$accessToken = "30604045.bf289e2.1ea23109549e464d83d4c41eef6df6c1";
					$url = "https://api.instagram.com/v1/users/self/media/recent/?access_token={$accessToken}";
					$result = file_get_contents($url);
				// 	r($result);
					$json = json_decode($result, true);
					$photos = array();
					for ($a = 0; $a < 6; $a++) {
					    $photosResult = $json['data'][$a]['images']['thumbnail'];
					    $photos[] = $photosResult;
					}
					return $photos;
				}
				
$a = getInsta();

r($a);

foreach ($a as $photo) {
    echo "<img src={$photo['url']}>";    
}


?>
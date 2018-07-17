<?php

require_once '../../php/libs/TwitterAPIExchange.php';
require_once '../../php/composer/vendor/autoload.php';

$settings = array(
    'oauth_access_token' => "2371870274-pauCnj8970ebKGniGcGRrkEKTGQkARDWjcAtw0W",
    'oauth_access_token_secret' => "Vs9u3OANgFMIzj9VzSojfqGUkIBh3IqBbZoSvd8NJC13L",
    'consumer_key' => "392KPuwv9jI7mDNG4w1oJ5L6Y",
    'consumer_secret' => "9XwB2bJWLIrvxuHEEuFYMcgxXxKXNIgAXOdjM1OP9QpGs7jJRb"
);

$twitter = new TwitterAPIExchange($settings);

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '';
$requestMethod = 'GET';

$a = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

r(json_decode($a,true));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>testando twitter API</title>
</head>
<body>
    
</body>
</html>
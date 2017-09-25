<?php

require_once 'php/c.php';

$client = new \GuzzleHttp\Client();

$lasfmApiKey = "2f6af24843eea696c30ffcb0bb425bde";
$secret = "2dd6c019e21201dfac20a227bb66131f";

$url = "http://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=thiiiii&api_key=2f6af24843eea696c30ffcb0bb425bde&format=json&limit=10";

$result = file_get_contents($url);

$json = json_decode($result, true);

r($json);

$tracks = $json['recenttracks']['track'];

r($tracks);

echo "<table border='1'>";

foreach($tracks as $data) {
    echo "<tr>";
        echo "<td>" . $data['name'] . '</td>';
        echo "<td>" . $data['artist']['#text'] . "</td>";
        echo "<td><img src='{$data['image'][1]['#text']}'></td>";
    echo "</tr>";    
}

echo "</table>";

// $url = "https://requestb.in/1m2y9cl1";
// $data = ['name' => 'thierryrene', 'email' => 'thierryrene@stealhelook.com.br'];

// $curl = curl_init($url);

// curl_setopt($curl, CURLOPT_POST, 1);
// curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
// // curl_setopt($curl, CURLOPT_HTTPHEADER,
// //     ['Content-type: application/json']
// // );
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// $result = curl_exec($curl);

// var_dump($result);

// curl_close($curl);

?>
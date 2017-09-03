<?php

require_once 'php/c.php';

$url = "https://requestb.in/1m2y9cl1";
$data = ['name' => 'thierryrene', 'email' => 'thierryrene@stealhelook.com.br'];

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($curl, CURLOPT_HTTPHEADER,
//     ['Content-type: application/json']
// );
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

var_dump($result);

curl_close($curl);

?>
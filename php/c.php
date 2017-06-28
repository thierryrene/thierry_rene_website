<?php

require_once 'testando_composer/vendor/autoload.php';

define('SERVERNAME', 'db');
define('USERNAME', 'root');
define('PASSWORD', 'umdoistres');
define('DB', 'thierryrenedb');

$mysqli = new mysqli(SERVERNAME, USERNAME, PASSWORD, DB);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {  
  $ip = $_SERVER['REMOTE_ADDR'];
  session_start();
  $_SESSION['ip'] = $ip;
}

r($GLOBALS);



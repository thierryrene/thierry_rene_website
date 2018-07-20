<?php

require_once 'vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

// Using Medoo namespace
use Medoo\Medoo;

// Initialize
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'consulado_db',
    'server' => '127.0.0.1',
    'username' => 'root',
    'password' => ''
]);

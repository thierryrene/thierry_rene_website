<?php

require_once ('../vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger($faker->name);
$log->pushHandler(new StreamHandler('log/your.log', Logger::WARNING));

// add records to the log
$log->error('Bar');
$log->warning('lorem');
$log->error('Bar');
$log->warning('lorem');
$log->info('Bar');

echo "<h1>log registrado.</h1>";
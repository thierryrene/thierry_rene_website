<?php

session_start();

require_once 'env.php';

require_once 'composer/vendor/autoload.php';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['SERVER_NAME'] == "thierryrenematoswebdev.me") {
  define('SERVERNAME', '127.0.0.1');
  define('SYSTEM_NAME', 'Havana');
  define('USERNAME', 'root');
  define('PASSWORD', '*casa123');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
} elseif ( $_SERVER['SERVER_NAME'] == 'thierryrenematoswebdev-site-ok-thierryrene.c9users.io')  {
  define('SERVERNAME', '127.0.0.1');
  define('SYSTEM_NAME', 'Havana');
  define('USERNAME', 'root');
  define('PASSWORD', '');
  define('DB', 'thierryrenewebdev');
  define('DEBUG', true);
  define('HOST', $_SERVER['SERVER_NAME']);
} else {
  define('SERVERNAME', 'db');
  define('SYSTEM_NAME', 'Havana');
  define('USERNAME', 'root');
  define('PASSWORD', 'umdoistres');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
}

function connect() {
  try {
    $pdo = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DB, USERNAME, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('set names utf8');
  } catch (PDOexception $e) {
    echo "erro: {$e->getMessage()}";
  }
  return $pdo;
}

$pdo = connect();

require_once 'functions.php';
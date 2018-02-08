<?php

session_start();

require 'env.php';

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['SERVER_NAME'] == "thierryrenematoswebdev.me") {
  define('SERVERNAME', '127.0.0.1');
  define('USERNAME', 'thierryrene');
  define('PASSWORD', '*casa123');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
} elseif ( $_SERVER['SERVER_NAME'] == 'thierryrenewebsite-thierryrene.c9users.io')  {
  define('SERVERNAME', '127.0.0.1');
  define('USERNAME', 'thierryrene');
  define('PASSWORD', '');
  define('DB', 'thierryrenedb');
  define('DEBUG', true);
  define('HOST', $_SERVER['SERVER_NAME']);
} else {
  define('SERVERNAME', '127.0.0.1');
  define('USERNAME', 'thierryrene');
  define('PASSWORD', '*casa123');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
}

if ($_SERVER['SERVER_NAME'] != "thierryrenematoswebdev.me") {
  require_once 'testando_composer/vendor/autoload.php';
}

function connect() {
  try {
    $pdo = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DB, USERNAME, PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('set names utf8');
  } catch (PDOexception $e) {
    "erro: {$e->getMessage()}";
  }
  return $pdo;
}

$pdo = connect();

require 'functions.php';
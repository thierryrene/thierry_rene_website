<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define('SERVERNAME', 'db');
  define('USERNAME', 'root');
  define('PASSWORD', 'umdoistres');
  define('DB', 'thierryrenedb');
  define('DEBUG', true);
  define('HOST', $_SERVER['SERVER_NAME']);
} else {
  define('SERVERNAME', 'localhost');
  define('USERNAME', 'thierryrenematos');
  define('PASSWORD', '*casa123');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
}

session_start();

try {
  $pdo = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DB, USERNAME, PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOexception $e) {
  "erro: {$e->getMessage()}";
}

if ($pdo) {
  $pdo->exec('set names utf8');
}

function returnContent($table) {
  global $pdo;
  $sql = "SELECT * FROM {$table} LIMIT 1";  
  $r = $pdo->query($sql);
  foreach ($r as $row) {
    echo "{$row['content']}<br>";
  }
}

function logAccess() {
  global $pdo;
  $q = "INSERT INTO access_log (id, host, path, log) 
        VALUES (NULL, '{$_SERVER['SERVER_NAME']}', '{$_SERVER['PHP_SELF']}', CURRENT_TIMESTAMP)";
  $r = $pdo->query($q);
}

function loginAdmin ($username, $password) {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE uid = ? AND pwd = ? AND status = 1");
  $r = $a->execute(array($username, $password));
  $obj = $a->fetchObject();
  if ($obj) {
    if(HOST == 'thierryrenewebdev.com') {
      header("Location:http://" . HOST . "/beta/thierryrenewebdev/php/admin/");
      $_SESSION['login'] = $_POST['uid'];
      die();
    } else { 
      header("Location:http://localhost/thierryrenewebdev/php/admin/");
      $_SESSION['login'] = $_POST['uid'];
      die();
    }   
  }
  header("Location:http://" . HOST);
}

function createUser ($name, $lastname, $username, $password) {
  global $pdo;
  $a = $pdo->prepare("INSERT INTO user (first, last, uid, pwd, status) VALUES (?, ?, ?, ?, 1)");
  if( $a->execute(array($name, $lastname, $username, $password)) ) {
    header("Location:http://localhost/thierryrenewebdev/php/admin/create_user.php?user_create={$username}");
  } else {
    echo 'ocorreu um erro ao criar o usuário';
  }  
}

function listActiveUsers () {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE status = 1");
  if ($a->execute()){
    $r = $a->fetchAll(PDO::FETCH_ASSOC);
      echo "<table class='table table-hover table-bordered text-center'>
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>last name</th>
                    <th>status</th>
                    <th>delete</th>
                    <th>update</th>
                  </tr>";
      foreach ($r as $row) {
        echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td><a href='http://localhost/thierryrenewebdev/php/admin/delete_user.php?id={$row['id']}'><button class='btn btn-danger'>delete</button></a></td>
                  <td></td>
                </tr>";
      }
      echo "</table>";
    }
}

function listNonUsers () {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE status = 0");
  if ($a->execute()){
    $r = $a->fetchAll(PDO::FETCH_ASSOC);
      echo "<table class='table table-hover table-bordered text-center'>
                  <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>last name</th>
                    <th>update</th>
                  </tr>";
      foreach ($r as $row) {
        echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td></td>
                </tr>";
      }
      echo "</table>";
    }
}

function deleteUser($userId) {
  global $pdo;
  $a = $pdo->prepare("UPDATE user SET status = 0 WHERE id = {$userId}");
  $a->execute();
}

function checkLogin() {
  if (!$_SESSION['login']) {
    header('location:http://' . HOST . '/thierryrenewebdev/php/?login_deny=1');
  }
}

function fileOpen($a) {
  $file = $a;
  $fileHandle = fopen($file, 'r');
  if (!$fileHandle) {
    echo "ocorreu um erro ao tentar ler o arquivo: <pre>{$file}</pre>";
    echo "<hr>";
    echo $file;
  } else {
    echo "o arquivo <pre>{$file}</pre> foi carregado com sucesso!";
  }
}

logAccess();

// checkLogin();

if (DEBUG == true) {
  require_once 'testando_composer/vendor/autoload.php';
  r($GLOBALS);
}



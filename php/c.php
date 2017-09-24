<?php

date_default_timezone_set('America/Sao_Paulo');

if ($_SERVER['SERVER_NAME'] == "thierryrenematosdev.info") {
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
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
} else {
  define('SERVERNAME', '127.0.0.1');
  define('USERNAME', 'thierryrene');
  define('PASSWORD', '*casa123');
  define('DB', 'thierryrenedb');
  define('DEBUG', false);
  define('HOST', $_SERVER['SERVER_NAME']);
}

session_start();

try {
  $pdo = new PDO('mysql:host=' . SERVERNAME . ';dbname=' . DB, USERNAME, PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec('set names utf8');
} catch (PDOexception $e) {
  "erro: {$e->getMessage()}";
}

function getTableContents($table) {
  global $pdo;
  $sql = "SELECT * FROM {$table}";  
  $r = $pdo->query($sql, PDO::FETCH_ASSOC);
  foreach($r as $rs) {
    return $rs;
  }
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

function checkHost($path) {
  if(HOST == $_SERVER['SERVER_NAME']) {
    header("location:http://" . HOST . "/php/{$path}");
  } else {
    header("location:http://localhost/thierryrenewebdev/php/{$path}");
  }
}

function loginAdmin ($username, $password) {
  global $pdo;
  $a = $pdo->prepare("SELECT * FROM user WHERE uid = ? AND pwd = ? AND status = 1");
  $r = $a->execute(array($username, $password));
  $obj = $a->fetchObject();
  if ($obj) {
    checkHost('admin/');
    $_SESSION['login'] = $_POST['uid'];
    die();   
  }
  header("Location:http://" . HOST);
}

function createUser ($name, $lastname, $username, $password) {
  global $pdo;
  $a = $pdo->prepare("INSERT INTO user (first, last, uid, pwd, status) VALUES (?, ?, ?, ?, 1)");
  if( $a->execute(array($name, $lastname, $username, $password)) ) {
    checkHost("admin/create_user.php?user_create={$username}");
  } else {
    echo 'ocorreu um erro ao criar o usuário';
  }  
}

function checkUserStatus() {
  if($row['status'] = 1) {
    $row['status'] = '<span class="label label-success">ativo</span>';
  } else {
    $row['status'] = '<span class="label label-danger">desativado</span>';
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
        if($row['status'] == 1) {
          $row['status'] = '<span class="label label-success">ativo</span>';
        } else {
          $row['status'] = '<span class="label label-danger">desativado</span>';
        }
        if(HOST == $_SERVER['SERVER_NAME']) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td><a href='http://" . HOST . "/php/admin/delete_user.php?id={$row['id']}'><button class='btn btn-danger btn-xs'>delete</button></a></td>
                  <td></td>
                </tr>";

        } else {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
                  <td><a href='http://" . HOST . "/thierryrenewebdev/php/admin/delete_user.php?id={$row['id']}'><button class='btn btn-danger'>delete</button></a></td>
                  <td></td>
                </tr>";
        }        
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
                    <th>status</th>
                    <th>update</th>
                  </tr>";
      foreach ($r as $row) {
        if($row['status'] == 1) {
          $row['status'] = '<span class="label label-success">ativo</span>';
        } else {
          $row['status'] = '<span class="label label-danger">desativado</span>';
        }
        echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['uid']}</td>
                  <td>{$row['first']}</td>
                  <td>{$row['last']}</td>
                  <td>{$row['status']}</td>
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
    checkHost('');
    $_SESSION['login'] = false;
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

if (DEBUG == true) {
  require_once 'testando_composer/vendor/autoload.php';
  r($GLOBALS);
}

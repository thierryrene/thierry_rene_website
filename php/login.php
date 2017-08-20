<?php

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

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

loginAdmin($uid, $pwd);


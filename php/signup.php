<?php

require 'c.php';

$first = $_GET['first'];
$last = $_GET['last'];
$uid = $_GET['uid'];
$pwd = $_GET['pwd'];

$insertUser = "INSERT INTO user (first, last, uid, pwd) VALUES ('{$first}', '{$last}', '{$uid}', '{$pwd}')";

$resultUser = $mysqli->query($insertUser);

header("Location: index.php");


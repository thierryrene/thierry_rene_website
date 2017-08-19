<?php

require 'c.php';

$first = $_POST['first'];
$last = $_POST['last'];
$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

createUser($first, $last, $uid, $pwd);
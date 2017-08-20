<?php

require_once 'c.php';

$uid = $_POST['uid'];
$pwd = $_POST['pwd'];

loginAdmin($uid, $pwd);


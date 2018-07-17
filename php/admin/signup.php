<?php

require '..c.php';

$first = $_POST['first'];
$last  = $_POST['last'];
$uid   = $_POST['uid'];
$pwd   = $_POST['pwd'];
$job   = $_POST['job'];
$image = $_POST['image_url'];

// modificar funcao para aceitar novos parametros
createUser($first, $last, $job, $image, $uid, $pwd);
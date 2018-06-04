<?php

require_once '../c.php';

checkLogin();

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    if ($status == 0) {
	    $query = $pdo->prepare("UPDATE sis_config SET status = 1 WHERE id = 1");
	} else {
	    $query = $pdo->prepare("UPDATE sis_config SET status = 0 WHERE id = 1");
	}
	
	$query->execute();

} 

header('location: last_fm.php');
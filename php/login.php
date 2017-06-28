<?php

require_once 'c.php';

$uid = $_GET['uid'];
$pwd = $_GET['pwd'];

$userLogin = "SELECT * FROM user WHERE uid='{$uid}' AND pwd='{$ṕwd}'";

$result = $mysqli->query($userLogin);

if (!$row = $result->fetch_assoc()) {
    echo "errou";
} else {
    $_SESSION['user'] = $row['id'];
    echo "logged!";
    ?>
    <script>
        alert('HAHA!');
        window.location.replace("admin/index.php");
    </script>
    <?php
}



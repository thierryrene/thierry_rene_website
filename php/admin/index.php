<?php

require_once "../c.php";

r($GLOBALS);

if (isset($_SESSION['user'])) {
    echo "Hello {$_SESSION['user']}!";
}
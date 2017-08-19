<?php

include_once('../c.php');

session_destroy();

header('location:http://localhost/thierryrenewebdev/php/?logout=1');
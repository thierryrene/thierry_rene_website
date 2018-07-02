<?php

include_once('../c.php');

checkLogin();

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    deleteUser($userId);
    checkHost('admin/create_user.php');
} else {
    header('location:http://' . ( HOST != 'localhost' ? HOST : HOST . '/thierryrenewebdev') . '/php/error=1');
}

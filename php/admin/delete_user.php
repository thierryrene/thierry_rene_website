<?php
include_once('../c.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    deleteUser($userId);
    header('location:http://localhost/thierryrenewebdev/php/admin/create_user.php');
} else {
    header('location:http://localhost/thierryrenewebdev/php/error=1');
}

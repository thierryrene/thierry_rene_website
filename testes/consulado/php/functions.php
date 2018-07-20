<?php 

require_once "c.php";

function get_all_table_data($table) {
    global $database;
    $data = $database->select($table, '*');    
    if ($data) {
        return $data;    
    } else {
        var_dump($database->error());
    }
}


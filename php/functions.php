<?php

function checkConfig() {
  global $pdo;
  $status = $c->prepare("SELECT * FROM system_config");
  if ($status->execute()) {
    $result = $status->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  } //$status->execute()
  else {
    return "erro";
  }
}

function checkSpecConfig($id) {
    
    function checkConfig() {
        
            global $pdo;
        
            $status = $pdo->prepare("SELECT * FROM sis_config");
            
            if ($status->execute()) {
                $result = $status->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return "erro";
            }
    }
    
    function checkSpecConfig($id) {
        
            global $pdo;
        
            $status = $pdo->prepare("SELECT status FROM sis_config WHERE id = {$id}");
            
            if ($status->execute()) {
                $result = $status->fetch(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return "erro";
            }
    }
    
    function powerConfig($configId) {
        global $pdo;
        
        $query = $pdo->prepare("SELECT status FROM sis_config WHERE id = {$configId}");
            
            if ($query->execute() == 1) {
                // $status = 'on';
                $turnOff = $pdo->prepare("UPDATE system_config SET status = 0 WHERE id = {$configId}");
                $turnOff = $pdo->execute();
            } else {
                // $status = 'off';
                $turnOn = $pdo->prepare("UPDATE system_config SET status = 1 WHERE id = {$configId}");
                $turnOn = $pdo->execute();
            }

                $turnOn = $pdo->execute();
            }

    }
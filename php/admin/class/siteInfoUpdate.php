<?php

include_once('../../c.php');

$canonical   = ( isset($_POST['site-canonical'])   ? $_POST['site-canonical']   : NULL );
$copyright   = ( isset($_POST['site-copy'])        ? $_POST['site-copy']        : NULL );

try {
    
    $c = $pdo->prepare("UPDATE seo_content
                        SET 
                            canonical = :canonical, copyright = :copyright
                        WHERE 
                            id = 2");
                        
    $c->bindParam(':canonical',   $canonical);
    $c->bindParam(':copyright',   $copyright);
    
    $c->execute();
    
} catch (PDOexception $e) {
  "erro: {$e->getMessage()}";
}

unset($c);

header("location: http://" . HOST . "/php/admin/seo.php");

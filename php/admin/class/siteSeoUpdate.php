<?php

include_once('../../c.php');

$author   = ( isset($_POST['site-author'])   ? $_POST['site-author']   : NULL );
$desc     = ( isset($_POST['site-desc'])     ? $_POST['site-desc']     : NULL );
$title    = ( isset($_POST['site-title'])    ? $_POST['site-title']    : NULL );
$keywords = ( isset($_POST['site-keywords']) ? $_POST['site-keywords'] : NULL );

try {
    
    $c = $pdo->prepare("UPDATE seo_content
                        SET 
                            title = :title, author = :author, description = :description, keywords = :keywords
                        WHERE 
                            id = 2");
                      
    $c->bindParam(':title',       $title);
    $c->bindParam(':author',      $author);
    $c->bindParam(':description', $desc); 
    $c->bindParam(':keywords',    $keywords);
    
    $c->execute();
    
} catch (PDOexception $e) {
  "erro: {$e->getMessage()}";
}

unset($c);

header("location: http://" . HOST . "/php/admin/seo.php");


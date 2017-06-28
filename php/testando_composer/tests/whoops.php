<?php

require_once ('../vendor/autoload.php');

$whoops = new Whoops\Run();

$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
 
// Set Whoops as the default error and exception handler used by PHP:
$whoops->register();  

$var1 = "casaaa";

if ($var1 == "casa") {
    echo "{$var1}";
} else {
    throw new RuntimeException("[ERRO]");
}

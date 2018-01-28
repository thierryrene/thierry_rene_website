<?php

require_once 'php/testando_composer/vendor/autoload.php';

$a = array('a', 'b', 'c');

if (in_array('a', $a)) {
	echo 'foi';
}

?>
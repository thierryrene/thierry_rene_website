<?php

// require 'php/testando_composer/vendor/autoload.php';
		
	// if (!file_exists('cache' . $_SERVER['SCRIPT_NAME'])) {
	// 	$cachefile = 'cache' . $_SERVER['SCRIPT_NAME'];
	// 	fopen($cachefile, 'w');
	// }	
	
	$dir = dirname($_SERVER['SCRIPT_NAME']);

	if(!is_dir($dir)) {
		mkdir($dir, 777);				
	} else {
		die;
	}	

	$cachefile = explode('/', $_SERVER['SCRIPT_NAME']);

	$cachefile = $cachefile['2'];

	$cachetime = 120 * 60;
	
	if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
		include_once($cachefile);
		echo "<!-- Cached " . date('d-m-Y H:i:s', filemtime($cachefile)) . " -->";
		exit;
	}

	ob_start(); 	
		
	require_once "php/c.php";

	logAccess();
	
	include_once "php/template/header.php";

?>

<span id="scroll-about"></span>

<?php

	include_once "php/template/skills.php";
 	include_once "php/template/about.php";
	include_once "php/template/svg.php";

?>

<span id="scroll-contact"></span>

<?php

	include_once "php/template/contact.php";
	include_once "php/template/footer.php";

	$fp = fopen($cachefile, 'w');

	$content = ob_get_contents();
		
	fwrite($fp, $content); 
	
	fclose($fp);

	var_dump($cachefile);
	 
	ob_end_flush();

?>

<?php

// require 'php/testando_composer/vendor/autoload.php';
		
	// if (!file_exists('cache' . $_SERVER['SCRIPT_NAME'])) {
	// 	$cachefile = 'cache' . $_SERVER['SCRIPT_NAME'];
	// 	fopen($cachefile, 'w');
	// }	
	
	$dir = 'cache' . dirname($_SERVER['SCRIPT_NAME']) . '/';

	var_dump($dir);

	if(!is_dir($dir)) {
		mkdir($dir, 755);				
	}

	$cachefile = explode('/', $_SERVER['SCRIPT_NAME']);

	$cachefilename = $cachefile['2'];

	$cachefilepath = $dir . $cachefilename;

	$cachetime = 120 * 60;
	
	if (file_exists($cachefilepath) && (time() - $cachetime < filemtime($cachefilepath))) {
		include_once($cachefilepath);
		echo "<!-- Cached " . date('d-m-Y H:i:s', filemtime($cachefile)) . " -->";
		exit;
	}

	ob_start(); 	
		
	include_once "php/c.php";

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

	$fp = fopen($cachefilepath, 'w');

	$content = ob_get_contents();
		
	fwrite($fp, $content); 
	
	fclose($fp);

	var_dump($cachefilepath);
	 
	ob_end_flush();

?>

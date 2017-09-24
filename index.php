<?php

	// if($_GET['cache'] = 1) {
	// 	$file = 'cache/index.html';
	// 	if(!unlink($file)) {
	// 		echo "<h1>erro</h1>";
	// 	}
	// 	unset($_GET['cache']);
	// }
	
	// var_dump($_GET);
	
	$dir = 'cache/' ;

	if(!is_dir($dir)) {	
		mkdir($dir, 755);				
	}

	$cachefile = explode('/', $_SERVER['SCRIPT_NAME']);

	if($_SERVER['HTTP_HOST'] == 'thierryrenematosdev.info') {
		$cachefilename = $cachefile[1];
	} else {
		$cachefilename = 'index.html';
	}

	$cachefilepath = $dir . $cachefilename;

	$cachetime = 360 * 60;
	
	// echo "<pre>";
	// var_dump($GLOBALS);

	if (file_exists($cachefilepath) && (time() - $cachetime < filemtime($cachefilepath))) {
		
		include_once "php/c.php";

		logAccess();
		
		$log = "<!-- cached " . date('d-m-Y H:i:s', filemtime($cachefilepath)) . " -->";

		echo "<script> console.log('{$log}'); </script>";

		include_once($cachefilepath);
		
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
		
	if (fwrite($fp, $content)) {
		echo "ok";
	}
	
	fclose($fp);
	
	ob_end_flush();

?>

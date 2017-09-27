<?php
	
	$dir = 'cache/' ;

	if(!is_dir($dir)) {	
		mkdir($dir, 755);				
	}
	
	$cachefilename = 'index.html';

	$cachefilepath = $dir . $cachefilename;
	
	if ($_SERVER['SERVER_NAME'] != 'thierryrenematosdev.info') {
		$cachetime = 0.1 * 60;	
	} else {
		$cachetime = 3000 * 60;
	}
	
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
		echo "<script> console.log('page cached'); </script>";
	}
	
	fclose($fp);
	
	ob_end_flush();

?>

<?php

	// created in 2014 and continuosly developed until now | date('d/m/Y');
	
	$dir = 'cache/' ;

	if(!is_dir($dir)) {	
		mkdir($dir, 755);				
	}
	
	$cachefilename = 'index.html';

	$cachefilepath = $dir . $cachefilename;
	
	$cachetime = ( $_REQUEST['drop'] == 1 ? 0.1 : (3000 * 60) );
	
	if (file_exists($cachefilepath) && (time() - $cachetime < filemtime($cachefilepath))) {
		
		include_once "php/c.php";
		include_once "php/functions.php";
		
		logAccess();
		
		$log = "<!-- cached " . date('d-m-Y H:i:s', filemtime($cachefilepath)) . " -->";
		
		echo "<script> console.log('{$log}'); </script>";
		
		include_once($cachefilepath);
		
		// unset variables to release php memory
		unset($cachefilepath, $cachetime, $cachefilename, $dir);
		
		exit;
	}

	ob_start();
	
	include_once "php/c.php";
	include_once "php/functions.php";

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
	
	unset($fp, $content, $cachefilename);

?>

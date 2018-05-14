<?php

	// created in 2014 and continuosly developed until now | date('d/m/Y');

// 	$dir = 'cache/' ;

// 	if(!is_dir($dir)) {
// 		mkdir($dir, 755);
// 	}

// 	$cachefilename = 'data_analysis.html';

// 	$cachefilepath = $dir . $cachefilename;

// 	$cachetime = ( isset($_GET['drop']) && $_GET['drop'] == 1 ? 0.1 : (3000 * 60) );

// 	if (file_exists($cachefilepath) && (time() - $cachetime < filemtime($cachefilepath))) {

// 		include_once "php/c.php";
// 		include_once "php/functions.php";

// 		logAccess();

// 		$log = "<!-- cached " . date('d-m-Y H:i:s', filemtime($cachefilepath)) . " -->";

// 		echo "<script> console.log('{$log}'); </script>";

// 		include_once($cachefilepath);

// 		// unset variables to release php memory
// 		unset($cachefilepath, $cachetime, $cachefilename, $dir);

// 		exit;
// 	}

// 	ob_start();

	include_once $_SERVER['DOCUMENT_ROOT'] . "/php/c.php";
	include_once $_SERVER['DOCUMENT_ROOT'] . "/php/functions.php";

	logAccess();

// 	$fp = fopen($cachefilepath, 'w');

// 	$content = ob_get_contents();

// 	if (fwrite($fp, $content)) {
// 		echo "<script> console.log('page cached'); </script>";
// 	}

// 	fclose($fp);

// 	ob_end_flush();

// 	unset($fp, $content, $cachefilename);
	
// 	$songs = getLastFmSongs(10);
	
	r($GLOBALS);
	
	require_once "acessosLog.php";

    $acessos = new acessosLog;
    $acessos->run()->render();

?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="container">


<div id="chartContainer"></div>





</body>
</html>
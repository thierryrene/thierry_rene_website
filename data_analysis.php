<?php

	// created in 2014 and continuosly developed until now | date('d/m/Y');

	$dir = 'cache/' ;

	if(!is_dir($dir)) {
		mkdir($dir, 755);
	}

	$cachefilename = 'data_analysis.html';

	$cachefilepath = $dir . $cachefilename;

	$cachetime = ( isset($_GET['drop']) && $_GET['drop'] == 1 ? 0.1 : (3000 * 60) );

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

	$fp = fopen($cachefilepath, 'w');

	$content = ob_get_contents();

	if (fwrite($fp, $content)) {
		echo "<script> console.log('page cached'); </script>";
	}

	fclose($fp);

	ob_end_flush();

	unset($fp, $content, $cachefilename);
	
	$songs = getLastFmSongs(10);
	
	r($songs);

?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		title:{
			text: "My First Chart in CanvasJS"              
		},
		data: [              
		{
			// Change type to "doughnut", "line", "splineArea", etc.
			type: "column",
			dataPoints: [
				{ label: "apple",  y: 10  },
				{ label: "orange", y: 15  },
				{ label: "banana", y: 25  },
				{ label: "mango",  y: 30  },
				{ label: "grape",  y: 28  }
			]
		}
		]
	});
	chart.render();
}
</script>
</head>
<body class="container">
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>
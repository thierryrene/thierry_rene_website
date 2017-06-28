<link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">

<?php

$indicesServer = array('PHP_SELF',
    'argv',
    'argc',
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    'HTTP_ACCEPT_CHARSET',
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'HTTPS',
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    'PATH_TRANSLATED',
    'SCRIPT_NAME',
    'REQUEST_URI',
    'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO') ;

echo '<div class="container">';
echo '<h1 class="text-center">SERVER URLS</h1>';
echo '<hr>';
echo '<table class="table table-hover table-bordered" cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td><span class="label label-success">'. $arg .'</span></td><td><span class="label label-default">'
            . $_SERVER[$arg] . '</span></td></tr>' ;
    }
    else {
        echo '<tr><td><span class="label label-danger">'. $arg .'</span></td><td>-</td></tr>' ;
    }
}
echo '</table>' ;
echo '</div>';
?>

<hr>

<?php

// DEBUG PARA CRIAR OPÇÃO DE VIDEOS PARA LINKS DO FACEBOOK
//$var = explode( 'vimeo.com/', 'http://vimeo.com/196647475' );
//$var = $c_video = explode( '&', $var[1] );
//$var = '<iframe src="http://player.vimeo.com/video/' . $var[0] . '?badge=0" width="600" height="338" frameborder="0" allowFullScreen></iframe>';
//var_dump($var);
//
//$var1 = 'https://www.facebook.com/facebook/videos/10154659446236729/';
//$var1 = '<iframe src="https://www.facebook.com/plugins/video.php?href=' . $var1 . '" width="500" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
//var_dump($var1);
//
//echo $var1;

?>
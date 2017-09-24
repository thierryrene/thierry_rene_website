<?php

$a = getTableContents('seo_content');

?>

<!doctype html>

<html lang="pt-br">
<!--
  _________________________________
/ Desenvolvido por Thierry Rene Web \
| Developer | <?php echo $_SERVER['SERVER_NAME']; ?> |
\ @thierryrenne                     /
  ---------------------------------
         \   ^__^
          \  (oo)\_______
             (__)\       )\/\
                 ||----w |
                 ||     ||
-->

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo $a['title']; ?></title>

  <meta name="author" content="<?php echo $a['author']; ?>">
  <meta name="title" content="<?php echo $a['title']; ?>">
  <meta name="description" content="<?php echo $a['description']; ?>">
  <meta name="keywords" content="<?php echo $a['keywords']; ?>">
  <meta name="copyright" content="<?php echo $a['copyright']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta http-equiv="cleartype" content="on">

  <!-- Bing meta tags -->
  <meta name="msvalidate.01" content="086C7B9115FFBAC3CA6EAF94F571BE8B" />

  <!-- Favicons meta tags -->
  <link rel="shortcut icon" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="57x57" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="114x114" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="72x72" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="144x144" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="60x60" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="120x120" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="76x76" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="152x152" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/apple-touch-icon-152x152.png">
  <link rel="icon" type="image/png" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-196x196.png" sizes="196x196">
  <link rel="icon" type="image/png" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-32x32.png" sizes="32x32">
  <meta name="apple-mobile-web-app-title" content="Thierry Rene Web Dev.">

  <!-- links -->
  <link rel="author" type="text/plain" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/humans.txt">
  <link rel="canonical" href="//<?php echo $_SERVER['SERVER_NAME']; ?>/">

  <!-- Google Site Verification -->
  <meta name="google-site-verification" content="ZjrrHSVfP-yMddXTenY3nS4XmBFmJmJYMAx1tML0AtM" />

  <!-- <link rel="stylesheet" href="css/base/normalize.css"> -->
  <!-- <link rel="stylesheet" href="css/base/main.css"> -->

  <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: //bootswatch.com/readable/ -->
  <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/readable/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS via SASS -->
  <link rel="stylesheet" href="css/app.css">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

  <!-- Animate.css -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.1.1/animate.min.css">
  
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

  <!--[if lt IE 9]>
  <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Windows/MS meta tags -->
  <meta name="application-name" content="Thierry Rene Web Dev.">
  <meta name="msapplication-TileColor" content="#424242">
  <meta name="msapplication-TileImage" content="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/mstile-144x144.png">
  <meta name="msapplication-config" content="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/browserconfig.xml">

  <!-- Twitter meta tags -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@thierryrenne">
  <meta name="twitter:creator" content="@thierryrenne">
  <meta name="twitter:title" content="Thierry Rene Web Dev.">
  <meta name="twitter:description" content="Desenvolver Web Front End">
  <meta name="twitter:url" content="//<?php echo $_SERVER['SERVER_NAME']; ?>">
  <meta name="twitter:image" content="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-196x196.png">

  <!-- Facebook meta tags -->
  <meta property="og:type" content="article">
  <meta property="og:site_name" content="Thierry Rene Web Developer">
  <meta property="article:author" content="//www.facebook.com/thierryrenesantosmatos">
  <meta property="og:title" content="Thierry Rene Web Dev.">
  <meta property="og:description" content="Desenvolvedor Web Front End">
  <meta property="og:url" content="//<?php echo $_SERVER['SERVER_NAME']; ?>">
  <meta property="og:image" content="//<?php echo $_SERVER['SERVER_NAME']; ?>/favicon/favicon-196x196.png">

  <!-- Pinterest meta tags -->
  <meta name="p:domain_verify" content="37bc592e8f3676b53f1bf7f2e686ba5b" />

</head>

<body>

  <div id="loading" style="#loading {
    position: absolute;
    width: 100%;
    height: 100%;
    background: url('img/spinner.gif') no-repeat center center;
  }"></div>

  <!--[if lt IE 7]>
            <p class="chromeframe">Você está utilizando um navegador <strong>desatualizado</strong>. Por favor <a href="//browsehappy.com/">atualize o seu navegador</a> ou <a href="//www.google.com/chromeframe/?redirect=true">ative o Google Chrome Frame</a> para melhorar a navegação.</p>
  <![endif]-->

  <!-- content goes here -->

  <nav id="custom-navbar" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#thierry-portfolio-navbar">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="home-bt" class="navbar-brand" href="/">Thierry Rene</a>
      </div>
      <div class="collapse navbar-collapse" id="thierry-portfolio-navbar">
        <ul class="nav navbar-nav navbar-right nav-tabs" role="tablist">

          <li><a href="#scroll-about">About</a></li>
          <li><a href="//websocialdev.com" target="_blank">My blog</a></li>
          <!--<li><a href="//expurgandodevaneios.<?php echo $_SERVER['SERVER_NAME']; ?>" target="_blank">@expurgandodevaneios</a></li>-->
          <li><a href="#scroll-contact">Contact</a></li>

        </ul>

      </div>

    </div>

  </nav>

  <header>

    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <img id="thierry-photo" class="img-responsive img-circle" src="img/photo.jpg" alt="Thierry Rene Web Developer">

          <div class="intro">
            <span id="name" class="name">Thierry Rene Matos</span>
            <hr id="star-hr" class="star-hr">
            <span id="prof" class="skills">web developer</span>
          </div>

        </div>

      </div>

    </div>

  </header>
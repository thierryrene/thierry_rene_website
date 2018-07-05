<?php

$seoData = getTableContents('seo_content', 'where id = 1');

// check if lastfm api is on or off
$lastFmStatus = checkSpecConfig(1);

?>

<!doctype html>

<html lang="pt-br">

<head>
  
  <!-- meta for browser -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta http-equiv="cleartype" content="on"> 

  <title><?= $seoData['title']; ?></title>  
  
  <!-- meta tags -->
  <?php require_once 'meta_tags.php'; ?>

  <!-- manifest -->
  <link rel="manifest" href="manifest.json" />   
  
  <!-- favicons -->
  <?php require_once 'favicons.php'; ?>

  <!-- human.txt -->
  <link rel="author" type="text/plain" href="//<?= $_SERVER['SERVER_NAME']; ?>/humans.txt">

  <!-- canonical -->
  <link rel="canonical" href="https://<?= $_SERVER['SERVER_NAME']; ?>/">  
  
  <!-- css libs -->
  <?php require_once 'css.php'; ?>  
  
  <!-- js deps -->
  <?php require_once 'js_deps.php'; ?>    
    
  <!-- javascript librarys -->
  <?php require_once 'js_libs.php'; ?>

</head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-MDLCV8Z" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!--[if lt IE 7]>
    <p class="chromeframe">Você está utilizando um navegador <strong>desatualizado</strong>. Por favor <a href="//browsehappy.com/">atualize o seu navegador</a> ou <a href="//www.google.com/chromeframe/?redirect=true">ative o Google Chrome Frame</a> para melhorar a navegação.</p>
  <![endif]-->

  <!-- content goes here -->

  <nav id="custom-navbar" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#thierry-portfolio-navbar">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="home-bt" class="navbar-brand" href="/">thierry rene matos</a>
      </div>
      <div class="collapse navbar-collapse" id="thierry-portfolio-navbar">
        <ul class="nav navbar-nav navbar-right nav-tabs" role="tablist">

          <li><a href="#scroll-about">About</a></li>
          <!--<li><a href="//websocialdev.com" target="_blank">My blog</a></li>-->
          <!--<li><a href="//expurgandodevaneios.<?= $_SERVER['SERVER_NAME']; ?>" target="_blank">@expurgandodevaneios</a></li>-->
          <li><a href="#scroll-contact">Contact</a></li>

        </ul>

      </div>

    </div>

  </nav>

  <header>

    <div class="container">

      <div class="row">

        <div class="col-md-12">

          <img data-anijs="if: mouseover, on: img, do: swing animated" id="thierry-photo" class="img-responsive img-circle" src="//avatars1.githubusercontent.com/u/1225308?s=400&u=5b7f93504bc654c9f6076e1b1b4a249a2a0ab697&v=4" alt="Thierry Rene Web Developer">

          <div class="intro">
            <span id="name" class="name">Thierry Rene Matos</span>
            <hr id="star-hr" class="star-hr">
            <span id="prof" class="skills">web developer</span>
          </div>

        </div>

      </div>

    </div>

  </header>

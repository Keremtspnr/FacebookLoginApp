<?php session_start(); ?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/custom.css" rel="stylesheet">

    <title>Facebook Login for Gezer</title>
  </head>
  <body>
    <?php
    require_once 'src/Facebook/autoload.php';
    require_once 'src/custom.php';
    ?>
    <?php
    $fb = new \Facebook\Facebook([
      'app_id' => '262413657681286',
      'app_secret' => '75929c699f2b1509c5a4ea5e6144b156',
      'default_graph_version' => 'v3.1',
      //'default_access_token' => '{access-token}', // optional
    ]);
    ?>
        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="./">Facebook Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./">Anasayfa</a>
            </li>
            <li class="nav-item">
              <?php if($_SESSION['login']==true && isset($_SESSION['fb_access_token'])){?>
                <a class="nav-link" href="logout">Çıkış</a>
              <?php } else { ?>
                <a class="nav-link" href="./">Giriş</a>
              <?php } ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>

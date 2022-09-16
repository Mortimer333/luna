<?php
  require_once dirname(__DIR__) . '/src/components/init.php';
  use Luna\Tool;
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Luna</title>
    <meta name="title" content="<?= TITLE ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= DESC ?>">
    <meta name="subtitle" content="<?= SUBTITLE ?>">
    <meta name="keywords" content="hundefriseur, warburg, hundesalon, hundesalon luna, marzena stefaniak">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= URL ?>">
    <meta property="og:title" content="<?= TITLE ?>r">
    <meta property="og:description" content="<?= DESC ?>">
    <meta property="og:image" content="<?= URL ?>/media/assets/logo_640x640.png">

    <!-- FAV ICO -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Tool::getFile('/media/assets/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Tool::getFile('/media/assets/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Tool::getFile('/media/assets/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= Tool::getFile('/media/assets/app.webmanifest'); ?>">

    <style media="screen">
      .floral {
        background-image: url('<?= URL . ASSET_PREFIX ?>/media/assets/floral.svg');
      }
    </style>
    <link rel="stylesheet" href="<?= Tool::getFile('/media/css/master.css'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <nav>
      <div class="container menu">
        <!--
          - about
          - contact
          - gallery
          - hours
        -->
        <div class="menu-item">
          <a href="#about">About</a>
        </div>
        <div class="menu-item">
          <a href="#about">Process</a>
        </div>
        <div class="menu-item logo">
          <img src="<?= Tool::getFile('/media/assets/paw.png'); ?>" alt="Paw">
        </div>
        <div class="menu-item">
          <a href="#about">Contact</a>
        </div>
        <div class="menu-item">
          <a href="#about">Gallery</a>
        </div>
      </div>
    </nav>
    <main>
      <?php require_once Tool::getComponent('hero') ?>
      <?php require_once Tool::getComponent('process') ?>
    </main>
    <footer>
      <div class="container">

      </div>
    </footer>

    <div class="enlarge-container" id="enlarge-container">
      <img src="" alt="">
    </div>
    <script src="<?= Tool::getFile('/media/js/master.js'); ?>" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

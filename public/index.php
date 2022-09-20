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

    <!-- Open Graph -->
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
        background-image: url('<?= URL ?>/media/assets/floral.svg');
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= Tool::getFile('/media/css/master.css'); ?>">
  </head>
  <body>
    <nav id="menu">
      <div class="container menu">
        <div class="menu-item">
          <a href="#contact" class="menu-item-desktop">About</a>
          <a href="#about" class="menu-item-mobile no-underline">
            <img src="<?= Tool::getFile('/media/assets/about_mobile.png'); ?>" alt="About">
          </a>
        </div>
        <div class="menu-item">
          <a href="#contact" class="menu-item-desktop">Process</a>
          <a href="#process" class="menu-item-mobile no-underline">
            <img src="<?= Tool::getFile('/media/assets/process_mobile.png'); ?>" alt="Process">
          </a>
        </div>
        <div class="menu-item logo">
          <a href="#about" class="no-underline">
            <img src="<?= Tool::getFile('/media/assets/paw.png'); ?>" alt="Paw">
          </a>
        </div>
        <div class="menu-item">
          <a href="#contact" class="menu-item-desktop">Contact</a>
          <a href="#contact" class="menu-item-mobile no-underline">
            <img src="<?= Tool::getFile('/media/assets/contact_mobile.png'); ?>" alt="Contact">
          </a>
        </div>
        <div class="menu-item">
          <a href="#contact" class="menu-item-desktop">Gallery</a>
          <a href="#gallery" class="menu-item-mobile no-underline">
            <img src="<?= Tool::getFile('/media/assets/gallery_mobile.png'); ?>" alt="Gallery">
          </a>
        </div>
      </div>
    </nav>
    <main>
      <?php require_once Tool::getComponent('hero') ?>
      <?php require_once Tool::getComponent('process') ?>
      <?php require_once Tool::getComponent('contact') ?>
      <?php require_once Tool::getComponent('gallery') ?>
    </main>
    <footer>
      <div class="container">
        © 2022
      </div>
    </footer>

    <div class="enlarge-container" id="enlarge-container">
      <img src="" alt="">
    </div>
    <script src="<?= Tool::getFile('/media/js/master.js'); ?>" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>

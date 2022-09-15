<?php
  require_once dirname(__DIR__) . '/src/components/init.php';
  use Luna\Tool\Config;
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Luna</title>
    <meta name="title" content="<?= Config::TITLE ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= Config::DESC ?>">
    <meta name="subtitle" content="<?= Config::SUBTITLE ?>">
    <meta name="keywords" content="hundefriseur, warburg, hundesalon, hundesalon luna, marzena stefaniak">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= Config::URL ?>">
    <meta property="og:title" content="<?= Config::TITLE ?>r">
    <meta property="og:description" content="<?= Config::DESC ?>">
    <meta property="og:image" content="<?= Config::URL ?>/media/assets/logo_640x640.png">

    <!-- FAV ICO -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Config::getFile('/media/assets/favicon/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Config::getFile('/media/assets/favicon/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Config::getFile('/media/assets/favicon/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= Config::getFile('/media/assets/app.webmanifest'); ?>">

    <style media="screen">
      .floral {
        background-image: url('<?= Config::URL . Config::ASSET_PREFIX ?>/media/assets/floral.svg');
      }
    </style>
    <link rel="stylesheet" href="<?= Config::getFile('/media/css/master.css'); ?>">
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
          <a href="#about">Contact</a>
        </div>
        <div class="menu-item logo">
          <img src="<?= Config::getFile('/media/assets/paw.png'); ?>" alt="Paw">
        </div>
        <div class="menu-item">
          <a href="#about">Gallery</a>
        </div>
        <div class="menu-item">
          <a href="#about">Hours</a>
        </div>
      </div>
    </nav>
    <main>
      <section class="hero container">
        <div class="hero-content">
          <header>
            <img src="<?= Config::getFile('/media/assets/logo.png'); ?>" alt="logo" class="hero-logo">
            <p><span class="gold-runes">Luna</span> - Hunderfriseur</p>
          </header>
          <div class="hero-body">
            <div class="gallery-card">
              <div class="gallery-card-view">
                <img src="<?= Config::getFile(Config::CARD_GALLERY[0] ?? ''); ?>" alt="preview" id="gallery-card-view-image">
              </div>
              <div class="gallery-card-track" id="galler-card-track">
                <?php foreach (Config::CARD_GALLERY as $i => $item): ?>
                  <div class="gallery-card-track-item<?php if ($i == 0): ?> active<?php endif; ?>" onclick="Luna.cardGalleryChange(event, '<?= Config::getFile($item); ?>');">
                    <img src="<?= Config::getFile($item); ?>" alt="<?= $item; ?>" is='lazy-img'>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="about-card">
              <div class="floral"></div>
              <img src="<?= Config::getFile('/media/assets/profile-ph.png'); ?>" alt="profile" class="about-card-bio-img">
              <p class="about-card-bio">
                &emsp;Hallo meine Name ist <span class="gold-runes-color">Marzena Stefaniak</span> und ich bin gelernte und zertifizierte <span class="gold-runes-color">Hundefriseur</span>. Ich bitte Pflege für kleine und grosse Hunde.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                &emsp;<span class="gold-runes-underline">Ut enim ad minim veniam</span>, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                in reprehenderit in voluptate <i class="gold-runes-italic">velit esse cillum dolore eu fugiat</i> nulla pariatur.<br>
                &emsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur <span class="gold-runes-strike">adipiscing elit, sed do</span> eiusmod tempor incididunt ut labore et dolore<br>
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="container">

      </div>
    </footer>
    <script src="<?= Config::getFile('/media/js/master.js'); ?>" charset="utf-8"></script>
  </body>
</html>

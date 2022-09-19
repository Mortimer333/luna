<?php
    use Luna\Tool;
?>

<section class="hero container full-page content" id="about">
  <div class="floral"></div>
  <div class="hero-content">
    <h1 class="hero-header">
      <img src="<?= Tool::getFile('/media/assets/logo.png'); ?>" alt="logo" class="hero-logo">
      <p><span class="gold-runes">Luna</span> - Hunderfriseur</p>
    </h1>
    <div class="hero-body">
      <div class="gallery-card luna-card luna-card-gold">
        <div class="frame"></div>
        <div id="galleryCardCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <?php foreach (CARD_GALLERY as $i => $item): ?>
              <div class="carousel-item<?php if ($i == 0): ?> active<?php endif; ?><?php if (!isset($item['review']['desc'])): ?> gallery-card-review-small<?php endif; ?>">
                <div class="gallery-card-before-after d-flex justify-content-between">
                  <div class="img-container d-flex align-items-center">
                    <img src="<?= Tool::getFile($item['before']) ?>" alt="before" is="lazy-img" class="enlarge-enabled">
                  </div>
                  <div class="img-container d-flex align-items-center">
                    <img src="<?= Tool::getFile($item['after']) ?>" alt="after" is="lazy-img" class="enlarge-enabled">
                  </div>
                </div>
                <div class="gallery-card-review luna-card">
                  <span class="frame frame-gold"></span>
                  <header class="gallery-card-review-header" title="<?= $item['review']['author'] ?>">
                    <span class="reviewer gold-runes"><?= $item['review']['author'] ?></span>
                    <?php if (isset($item['review']['stars'])): ?>
                      <span class="stars">
                        <?php for($i = 0;$i < 5; $i++): ?>
                          <span class="star"><?php if ($i + 1 <= $item['review']['stars']): ?>★<?php else: ?>☆<?php endif; ?></span>
                        <?php endfor; ?>
                      </span>
                    <?php endif; ?>
                  </header>
                  <?php if (isset($item['review']['desc'])): ?>
                    <p class="galler-card-review-desc">
                      <?= $item['review']['desc'] ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
          <?php if (sizeof(CARD_GALLERY) > 1): ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#galleryCardCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#galleryCardCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          <?php endif; ?>
        </div>
      </div>
      <div class="about-card luna-card">
        <div class="frame frame-gold"></div>
        <div class="floral"></div>
        <img src="<?= Tool::getFile('/media/assets/profile.jpg'); ?>" alt="profile" class="about-card-bio-img">
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

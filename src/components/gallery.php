<?php
  use Luna\Tool;
?>
<section class="gallery-section grey-bg full-page content" id="gallery">
  <div class="container">
    <h1 class="center-title gold-runes-color">Gallery</h1>
    <div class="gallery">
      <?php foreach (Tool::getGalleryItems() as $src): ?>
        <div class="img-box">
          <img src="<?= $src ?>" class="enlarge-enabled" is="lazy-img">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
  use Luna\Tool;
?>
<section class="contact full-page content">
  <div class="container">
    <div class="process-graph gold-runes-color">
      <img src="<?= Tool::getFile('media/assets/dog_call_center.png') ?>" alt="call us" is="lazy-img">
    </div>
    <h1 class="center-title gold-runes-color">Contact</h1>


    <div class="hero-content">
      <div class="hero-body revers">

        <div class="contact-card about-card luna-card">
          <div class="frame frame-gold"></div>
          <div class="floral"></div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2486.4296835705836!2d9.101930515950185!3d51.45026692269961!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bb0ed13b804c65%3A0x93281ce124695856!2sZu%20den%20Drei%20Steinen%2018%2C%2034414%20Warburg%2C%20Germany!5e0!3m2!1sen!2spl!4v1663522414349!5m2!1sen!2spl" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <div class="contact-list">
            <ul>
              <li><a href="tel:015156107688">015 156 107 688</a></li>
              <li><a href="mailto:stefaniakmarzena0@gmail.com">stefaniakmarzena0@gmail.com</a></li>
              <li><a href="">instagram</a></li>
              <li><a href="https://www.facebook.com/marzena.stefaniak.522">marzena.stefaniak.522</a></li>
              <li><a href="https://www.ebay-kleinanzeigen.de/s-anzeige/hundesalon-luna/2199558162-133-1164?utm_source=sharesheet&utm_medium=social&utm_campaign=socialbuttons&utm_content=app_android">E-bay</a></li>
            </ul>
          </div>
        </div>

        <div class="gallery-card luna-card luna-card-gold">
          <div class="frame"></div>
          <h2 class="title-grey">Make an appointment</h2>
          <div class="separator"></div>
          <form class="luna-form">
            <?= Tool::generateFormFields(CONTACT_FORM) ?>
            <div class="separator"></div>
            <div class="submit grey-bg">
                <div class="frame frame-gold"></div>
                <input type="submit" name="submit_contact" value="Send" class="gold-runes-color">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

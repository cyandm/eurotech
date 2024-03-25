<?php
$frontPageId = get_option('page_on_front');
$sliderGroup = get_field("home_sketch_slider", $frontPageId);

if (!isset($sliderGroup))
  return;
?>

<section class="home-sketch-slider">
  <div class="container">
    <div id="home-sketch-slider" class="swiper">
      <div class="swiper-wrapper">
        <?php for ($i = 1; $i <= 7; $i++) : ?>
          <?php
          $title = $sliderGroup['slide_' . $i]['title'];
          $content = $sliderGroup['slide_' . $i]['content'];

          if (!isset($title) || !isset($content))
            continue;
          ?>
          <div class="swiper-slide">
            <div class="slide">
              <div class="img">
                <img src="<?= get_stylesheet_directory_uri() . '/assets/img/sketch/sketch-' . $i . '.png' ?>" class="md">
                <img src="<?= get_stylesheet_directory_uri() . '/assets/img/sketch/sketch-' . $i . '-sm.png' ?>" class="sm">
              </div>

              <div class="content">
                <div class="title-br">
                  <h3><?= $title ?></h3>
                </div>

                <div class="context">
                  <p><?= $content ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endfor; ?>
      </div>

      <div class="swiper-navigation">
        <div>
          <button class="swiper-btn-prev button-primary"><i class="iconsax" icon-name="arrow-left"></i></button>
          <button class="swiper-btn-next button-primary"><i class="iconsax" icon-name="arrow-right"></i></button>
        </div>
      </div>
    </div>
  </div>
</section>
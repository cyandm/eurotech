<?php
$frontPageId = get_option('page_on_front');
$sliderGroup = get_field("home_head_slider", $frontPageId);

if (!isset($sliderGroup))
  return;
?>

<section class="home-head-slider">
  <div id="home-head-slider" class="swiper">
    <div class="swiper-wrapper">
      <?php foreach ($sliderGroup as $sliderField) : ?>
        <?php if (!empty($sliderField['image'])) : ?>
          <div class="swiper-slide">
            <img src="<?= $sliderField['image'] ?>" alt="<?= $sliderField['title'] ?>">
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="container">
      <div class="slide-details">
        <div class="title">
          <h2 class="bg-filter">Combination of safe modern & special world</h2>
        </div>

        <div class="deliver">
          <div class="bg-filter">
            <h3>FIND ARGUE VALLEY DOOR DEALER NEAR YOU</h3>

            <form action="./" method="get">
              <label for="zipcode">
                <i class="iconsax" icon-name="location"></i>
                Enter Your Zipcode
              </label>
              <input type="text" name="zipcode" id="zipcode" placeholder="00100-99990" />
              <button type="submit" class="button-primary">Find</button>
            </form>
          </div>

          <a href="#" class="bg-filter">
            <h3>
              Explore Our Doors
              <br>
              <i class="iconsax" icon-name="arrow-right"></i>
            </h3>
          </a>
        </div>
      </div>
    </div>

    <div class="swiper-pagination"></div>
  </div>
</section>
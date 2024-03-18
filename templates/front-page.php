<?php /* Template Name: Home */ ?>

<?php get_header() ?>

<main class="main home">
  <?php
  get_template_part('templates/home/head-slider', null, []);
  get_template_part('templates/home/product-tabs', null, []);
  get_template_part('templates/home/sketch-slider', null, []);
  get_template_part('templates/home/catalog', null, []);
  get_template_part('templates/home/idea', null, []);
  ?>
</main>

<?php get_footer(); ?>
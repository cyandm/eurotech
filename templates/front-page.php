<?php /* Template Name: Home */ ?>

<?php get_header() ?>

<main class="main home">
  <?php get_template_part('templates/home/head-slider', null, []); ?>
  <?php get_template_part('templates/home/video'); ?>
  <?php get_template_part('templates/home/top-blogs'); ?>
</main>

<?php get_footer(); ?>
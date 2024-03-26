<?php
$frontPageId = $args['front_page_id'];
$video_file  = get_field('video_file', $frontPageId);
$video_link  = get_field('video_link', $frontPageId);
$video_cover = get_field('video_cover', $frontPageId);

if (!isset($video_link) && !isset($video_file))
  return;
?>

<section class="home__video container">

  <div class="home__video__content">

    <?php $video_show = !$video_file && !$video_link;

    if (!$video_show) : ?>

      <video class="video" width="100%" height="100%" controls poster="<?= $video_cover ?>">

        <source src="<?= $video_link ?>" />
        <source src="<?= $video_file ?>" />

      </video>

      <div class="video-cover">
        <i class="iconsax" icon-name="play"></i>
      </div>

    <?php endif ?>

  </div>

</section>
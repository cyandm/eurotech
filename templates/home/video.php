<?php
$video_file = get_field('video_file');
$video_link = get_field('video_link');
$video_cover = get_field('video_cover');
?>

<section class="home__video container">

    <div class="home__video__content">

        <?php $video_show = !$video_file && !$video_link;

        if (!$video_show) : ?>

            <video width="100%" height="100%" controls class="video">

                <source src="<?= $video_link ?>" />
                <source src="<?= $video_file ?>" />

            </video>

            <div class="video-cover" style="background-image: url(<?= $video_cover ?>);">
                <i class="iconsax" icon-name="play"></i>
            </div>

        <?php endif ?>

    </div>

</section>
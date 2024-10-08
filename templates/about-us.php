<?php /*Template Name: About-us */ get_header() ?>
<?php
$banner = get_the_post_thumbnail_url($post_id, 'full');
$eurotech_video = get_field('eurotech_video');
$poster= get_field('video_poster_about');
?>
<main class="about-us">
    <section class="about-us__hero">
        <div class="about-us__hero__items hero" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
            <p class="about-us__hero__items__text hero__title container">
                 <?=  get_field('banner_title'); ?></p>
        </div>
        <div class="about-us__hero__items__text hero__title__mobile container">
            <p><?=  get_field('banner_title'); ?></p>
        </div>
 </section>
    <div class="container">
        <div class="about-content ">
            <div class="our_team">
                <h2><?= get_field("about_title_one"); ?></h2>
                <p> <?= get_field("about_section_one"); ?></p>
             </div>
            <div class="our_team order">
                <h2>
                    <?= get_field("about_title_two"); ?>
                </h2>
                <p>
                    <?= get_field("about_section_two"); ?>
                </p>
            </div>
            <img class="about_img" src="<?= get_field("about_img"); ?>" />
        </div>
        <?php if(isset($ff)): ?>
        <div class="about-us-content ">
            <?php if($eurotech_video || $poster): ?>
            <video controls class="about-video"  poster="<?= $poster; ?>">
                <source src="<? echo $eurotech_video; ?>" type="video/mp4">
            </video>
            <?php endif; ?>
            <div class="company">
                <h2>What we are proud of</h2>
                <p>
                    <?= get_field("about_statistics"); ?>
                </p>
                <div class="statistics">
                    <div class="statistic">
                        <h2>+
                            <?= get_field("eurotech_consent"); ?>
                        </h2>
                        <span><?= get_field('consent_title'); ?>
                        </span>
                    </div>
                    <div class="statistic">
                        <h2>+
                            <?= get_field("eurotech_project"); ?>
                        </h2>
                        <span><?= get_field('project_title'); ?>
                        </span>
                    </div>
                    <div class="statistic">
                        <h2>+
                            <?= get_field("eurotech_expert"); ?>
                        </h2>
                        <span><?= get_field('experts_title'); ?>                          
                        </span>
                    </div>
                    <div class="statistic">
                        <h2>+
                            <?= get_field("eurotech_adviser"); ?>
                        </h2>
                        <span><?= get_field('adviser_title'); ?>    
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-steps">
            <div class="steps  mb-hide">
                <div class="step">
                    <div class="step_padding">
                        <h5>Step 1</h5>
                        <h2>
                            <?= get_field("step_one"); ?>
                        </h2>
                        <p>
                            <?= get_field("step_one_text"); ?>
                        </p>
                    </div>
                    <div class="step-icon">
                        <img src="<?= get_field("step_one_icon"); ?>" />
                    </div>
                </div>
                <div class="step">
                    <div class="step_padding">
                        <h5>Step 2</h5>
                        <h2>
                            <?= get_field("step_two"); ?>
                        </h2>
                        <p>
                            <?= get_field("step_two_text"); ?>
                        </p>
                    </div>
                    <div class="step-icon">
                        <img src="<?= get_field("step_two_icon"); ?>" />
                    </div>
                </div>
                <div class="step">
                    <div class="step_padding">
                        <h5>Step 3</h5>
                        <h2>
                            <?= get_field("step_three"); ?>
                        </h2>
                        <p>
                            <?= get_field("step_three_text"); ?>
                        </p>
                    </div>
                    <div class="step-icon">
                        <img src="<?= get_field("step_three_icon"); ?>" />
                    </div>
                </div>
                <div class="step">
                    <div class="step_padding">
                        <h5>Step 4</h5>
                        <h2>
                            <?= get_field("step_four"); ?>
                        </h2>
                        <p>
                            <?= get_field("step_four_text"); ?>
                        </p>
                    </div>
                    <div class="step-icon">
                        <img src="<?= get_field("step_four_icon"); ?>" />
                    </div>
                </div>
            </div>
            <img class="eurotech_img" src="<?= get_field("eurotech_img"); ?>" />
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper mySwiper about-steps-slider hide">
        <?php
        get_template_part(
            'templates/components/cards/about-slider',
            null,
        );
        endif;
        ?>
    </div>
</main>
<?php  get_footer() ?>
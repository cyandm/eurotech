<?php

$top_blogs = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
]);

$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();


?>


<section class="home__top-blogs container">

    <div class="home__top-blogs top-bar">?????</div>

    <div class="home__top-blogs__posts">

        <?php
        while ($top_blogs->have_posts()) {
            $top_blogs->the_post();
            $post_id = get_the_ID();
            get_template_part('/templates/components/cards/blog-cards/blog', 'homepage', ['post_id' => $post_id]);
        }
        ?>

        <?php wp_reset_postdata() ?>


    </div>

    <div class="home__top-blogs__posts__mobile">

        <?php
        while ($top_blogs->have_posts()) {
            $top_blogs->the_post();
            $post_id = get_the_ID();
            get_template_part('/templates/components/cards/blog-cards/blogpage', 'card', ['post_id' => $post_id]);
        }
        ?>

        <?php wp_reset_postdata() ?>


    </div>

</section>
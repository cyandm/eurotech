<?php get_header() ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$author_name = get_the_author_meta('display_name', get_post_field('post_author', get_the_ID()));
$banner = get_the_post_thumbnail_url($post_id, 'full');
$blog_slider = new WP_Query([
    'post_type' => 'post',
    'post__not_in' => [get_the_ID()],
]); ?>
<main class="blog-page">

    <!-- Swiper -->
    <div class="banner" style="background-image:url('<?php echo $banner; ?>')">
        <div class="swiper blogslider banner_text">
            <div class="swiper-wrapper">
                <?php
                while ($blog_slider->have_posts()) {
                    $blog_slider->the_post();
                    $post_id = get_the_ID();
                    get_template_part('/templates/components/cards/blog-cards/blog', 'topslider', ['post_id' => $post_id]);
                }
                ?>
                <?php wp_reset_postdata() ?>

            </div>
            <div class="slider-pagination">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <!-- top slider blog -->
    <div class="container blog-archive">
        <div class="sidebar">

        </div>

        <hr />
        <div class="blog-main">
            <div class="blog-head">
                <ul>
                    <?php wp_list_categories(
                        [
                            'orderby' => 'id',
                            'hide_empty' => false,
                            'title_li' => "",
                            'current_category' => 1
                        ]
                    ) ?>
                </ul>
            </div>
            <div class="blog-section">

                <div class="blogs">
                    <?php
                    $new_blogs = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                    ]);
                    ?>
                    <?php
                    $new_blogs->the_post();
                    get_template_part('/templates/components/cards/blog-cards/blogpage', 'card', ['post_id' => $post_id]);

                    ?>
                    <?php wp_reset_postdata() ?>

                </div>

            </div>


            <?php
            $links = paginate_links(
                array(
                    'total' => $new_blogs->max_num_pages,
                )
            );
            if ($links) {
                echo "<div class='pagination'>$links</div>";
            }
            ?>
        </div>
    </div>
</main>

<?php get_footer() ?>
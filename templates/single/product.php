<?php get_header(); ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$banner = get_the_post_thumbnail_url($post_id, 'full');
$rating = get_field("rating");
$front_page_id = get_option('page_on_front');
$suggested = get_field("popular_posts");
$img_2 = get_field("product_secound_image", $post_id);
$img_3 = get_field("product_third_image");
$img_4 = get_field("product_fourth_image");
?>
<main class="product">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <div class="gallery">
            <div>
                <img src="<?= !empty($img_2) ? $img_2 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
                <img src="<?= !empty($img_3) ? $img_3 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
                <img src="<?= !empty($img_4) ? $img_4 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
            </div>
            <button class="hover-zoom mb-hide">
                hover to zoom
            </button>
        </div>
    </div>
    <div class="container">
        <div class="titr">

            <h2>
                <?= get_the_title(); ?>
            </h2>
            <div class="product-title">
                <span>
                    <?= get_field("product_sku") . ' SKU'; ?>
                </span>
                <span class="score">
                    <?= str_repeat('<i class="iconsax" icon-name="star" fill="red"></i>', $rating);
                    ?>
                </span>
            </div>
        </div>
        <div class="post-content">
            <?php the_content() ?>
        </div>
        <div class="Property">
            <?php
            get_template_part(
                'templates/components/cards/product-cards/product-Property',
                null,
            );
            ?>
        </div>
        <p class="product-pagination">
            <?= previous_post_link('<span>&larr; %link</span>', 'previous Item'); ?>
            <?= next_post_link('<span>%link &rarr;</span>', 'Next Item'); ?>
        </p>
        <?php get_template_part('/templates/components/cards/product-cards/single-product', 'footer');
        ?>
    </div>
</main>
<?php get_footer() ?>
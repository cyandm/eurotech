<?php get_header(); ?>
<?php
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$banner = get_the_post_thumbnail_url($post_id, 'full');
$rating = get_field("rating");
$best_seller = get_field('best_seller');
$product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 6,
    'post__not_in' => [get_the_ID()],
]);
// var_dump(get_queried_object());
$top_term = get_the_terms($post_id, 'product-category');
$category = $top_term[0]->name;

?>
<main class="product">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>

        <div class="gallery">
            <div>
                <img src="<?= get_field("product_secound_image"); ?>" />
                <img src="<?= get_field("product_third_image"); ?>" />
                <img src="<?= get_field("product_fourth_image"); ?>" />

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
            <span>
                <?php previous_post_link('&larr; %link', 'Previous Item'); ?>
            </span>
            <span>
                <?php next_post_link('%link &rarr;', 'Next Item'); ?>
            </span>
        </p>

        <div class="like-product">
            <h2>Maybe you like it</h2>
            <div class="products">
                <?php
                while ($product->have_posts()) {
                    $product->the_post();
                    $product_id = get_the_ID();
                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $product_id]);

                    wp_reset_postdata();

                }
                ?>

                <?php wp_reset_postdata() ?>
            </div>
        </div>
        <div class="like-product">
            <h2>best seller</h2>
            <div class="products">
                <?php
                while ($product->have_posts()) {
                    $product->the_post();
                    $post_id = get_the_ID();
                    get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $post_id]);
                }
                ?>
                <?php wp_reset_postdata() ?>
            </div>
        </div>
    </div>
</main>
<?php wp_footer() ?>
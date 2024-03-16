<?php get_header(); ?>
<?php
$banner = get_field("product_archive_banner");
$product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 6,
    'post__not_in' => [get_the_ID()],
]);
?>

<main class="archive-product">
    <div class="banner"
        style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/product-archive.png' ?>);">

        <p>Our doors add beauty and elegance to your office</p>
    </div>
    <div class="container">
        <div class="sidebar">
            <?php
            get_template_part(
                'templates/components/sidebar/products-sidebar',
                null,
            );
            ?>
        </div>
        <div class="allproduct">
            <div class="like-product">
                <h2>best seller</h2>
                <div class="products">

                    <?php
                    while ($product->have_posts()) {
                        $product->the_post();
                        $post_id = get_the_ID();
                        get_template_part('/templates/components/cards/suggest', 'product', ['post_id' => $post_id]);
                    }
                    ?>
                    <?php wp_reset_postdata() ?>
                </div>
            </div>
        </div>
    </div>
</main>
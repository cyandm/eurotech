<?php get_header(); ?>
<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();
$suggested = get_field("popular_posts");
$img_2 = get_field("product_secound_image", $post_id);
$img_3 = get_field("product_third_image");
$img_4 = get_field("product_fourth_image");
$sku = get_field("product_sku");
?>
<main class="product container">
    <div class="gallery">
        <div class="product_gallery swiper">
            <div class="swiper-wrapper">
                <img class="swiper-slide"
                    src="<?= !empty($img_2) ? $img_2 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
                <img class="swiper-slide"
                    src="<?= !empty($img_3) ? $img_3 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
                <img class="swiper-slide"
                    src="<?= !empty($img_4) ? $img_4 : get_stylesheet_directory_uri() . '/assets/img/sample.png' ?>" />
            </div>
        </div>



        <div class="product_detail">
            <div class="titr">
                <h2>
                    <?= get_the_title(); ?>
                </h2>
                <span class="product-title">
                    <?= !empty($sku) ? $sku . ' SKU' : ''; ?>
                </span>
            </div>
            <div class="product-content paragraph">
                <?php the_content() ?>
            </div>
            <a href="#tab2"> view more</a>
            <?php
            get_template_part(
                'templates/components/cards/product-cards/product-Property',
                null,
            );
            ?>
        </div>



    </div>
    <?php
    get_template_part(
        'templates/components/cards/product-cards/product-description',
        null,
    );
    ?>

    <?php get_template_part('/templates/components/cards/product-cards/single-product', 'footer');
    ?>

</main>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".product_gallery", {});
</script>
<?php get_footer() ?>
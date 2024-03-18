<?php
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$rating = get_field("rating");
$best_seller = get_field('best_seller');
$product = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 4,
    'post__not_in' => [get_the_ID()],
]);
$top_term = get_the_terms($post_id, 'product-category');
//$category = $top_term[0]->name;
?>
<div class="list-of-category">
    <h3> category</h3>
    <?php ?>
</div>
<div class="like-product">
    <h3>Maybe you like it</h3>
    <div class="sidebar-products">
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
    <h3>best seller</h3>
    <div class="sidebar-products">
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
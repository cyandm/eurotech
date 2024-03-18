<?php ?>
<?php
$banner = get_the_post_thumbnail_url($post_id, 'full');


$search_query = get_search_query();

$query_blog_args = [
    'post_type' => "post",
    's' => $search_query,
    'post_per_page' => -1

];
$query_blog = new WP_Query($query_blog_args);

$query_product_args = [
    'post_type' => "product",
    's' => $search_query,
    'post_per_page' => -1

];
$query_product = new WP_Query($query_product_args);

?>
<?php

//global $wp_query;

// $searchQuery = get_search_query();
// $paged = get_query_var('paged') ? get_query_var('paged') : 1;

// if (isset($_GET['section']) && $_GET['section'] == 'blog') {
//     $section = "blog";
// } elseif (isset($_GET['section']) && $_GET['section'] == 'product') {
//     $section = "product";
// } else {
//     $section = "all";
// }


?>

<?php get_header() ?>
<main class="search-result-page">
    <div class="banner" <?php printf("style=\"background-image:url('%s')\"", $banner) ?>>
        <p>
            <?= get_field("search_title"); ?>
        </p>
    </div>
    <div class="search-result container">
        <?php if (($query_product->have_posts()) || ($query_blog->have_posts())) : ?>

            <?php if ($query_product->have_posts()) : ?>
                <div class="product-result">
                    <h2>
                        Search results in products for <span>"<?php echo  get_search_query();  ?> "</span>
                    </h2>
                    <div class="product-desktop">
                        <?php
                        if ($query_product->have_posts()) {
                            while ($query_product->have_posts()) {
                                $query_product->the_post();
                                get_template_part('templates/components/cards/product-cards/suggest', 'product');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <div class="product-mobile">
                        <?php
                        if ($query_product->have_posts()) {
                            while ($query_product->have_posts()) {
                                $query_product->the_post();
                                get_template_part('templates/components/cards/card', 'post-small');
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>

                </div>
            <?php endif ?>
            <?php if ($query_blog->have_posts()) : ?>

                <div class="blog-result">
                    <h2>Search results in blogs for <span>"<?php echo  get_search_query();  ?> "</span></h2>
                    <div class="blog-desktop">
                        <?php

                        if ($query_blog->have_posts()) {
                            while ($query_blog->have_posts()) {
                                $query_blog->the_post();
                                get_template_part('templates/components/cards/blog-cards/blogpage', 'card');
                            }
                        }
                        wp_reset_postdata();

                        ?>
                    </div>
                    <div class="blog-mobile">
                        <?php

                        if ($query_blog->have_posts()) {
                            while ($query_blog->have_posts()) {
                                $query_blog->the_post();

                                get_template_part('templates/components/cards/card', 'post-small');
                            }
                        }
                        wp_reset_postdata();

                        ?>
                    </div>
                </div>

            <?php endif ?>
        <?php else : ?>
            <div class="not-found-search">
                <h2>Search results for <span>"<?php echo  get_search_query();  ?> "</span></h2>
                <div class="result-cant-found">
                    <div>
                        result not found!
                    </div>
                    <h4> whoops! this information is not available</h4>
                </div>
            </div>
        <?php endif ?>
    </div>
    <section>


    </section>
</main>
<?php get_footer() ?>
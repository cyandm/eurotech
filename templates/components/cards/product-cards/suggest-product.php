<?php $post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$top_term = get_the_terms($post_id, 'product-category');
$category = $top_term[0]->name;
?>
<div class="product-card">
    <a href="<?php the_permalink($post_id) ?>">
        <div class="card">
            <img src="<?= get_field("product_secound_image") ?>" />
            <div class="detail">
                <p class="paragraph">
                    <?= get_the_title($post_id);
                    ?>
                </p>
                <p class="cat">
                    <?= isset ($top_term) ? $category : "door";
                    ?>

                    <a href="<?php the_permalink($post_id) ?>"> <i class="iconsax" icon-name="arrow-right"></i>
                    </a>
                </p>
            </div>
        </div>
    </a>
</div>
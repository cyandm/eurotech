<?php
$product_content = get_the_content();
?>
<div class="property_tab">
    <?php if ("" !== $product_content): ?>
        <div class="tab" id="tab2">product description</div>
        <div id="tab2Content" class="tab-content">
            <?= $product_content ?>
        </div>
    <?php endif; ?>

    <?php if ("" != (get_field("catalog"))): ?>
        <div class="tab" id="tab3">product catalog</div>
        <div id="tab3Content" class="tab-content">
            <p>Click to download the catalog</p>
            <a href="<?= get_field("catalog"); ?>" class="download">
                <span> Download
                    <?php get_template_part('/templates/components/svg/icon-download-pdf') ?>
                </span>
            </a>
        </div>
    <?php endif; ?>
    <?php
    get_template_part(
        'templates/components/cards/product-cards/product-question',
        null,
    );
    ?>
    <p class="product-pagination">
        <?= previous_post_link('<span>&larr; %link</span>', 'previous Item'); ?>
        <?= next_post_link('<span>%link &rarr;</span>', 'Next Item'); ?>
    </p>
</div>
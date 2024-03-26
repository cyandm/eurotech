<div class="tab" name="tab" id="tab1">specifications</div>
<div id="tab1Content" name="tab-content" class="tab-content">
    <div class="Variable-name">
        <span>
            <?= get_field("1_feature_label") ?>
        </span>
        <span>
            <?= get_field("2_feature_label") ?>
        </span>
        <span>
            <?= get_field("3_feature_label") ?>
        </span>
        <span>
            <?= get_field("4_feature_label") ?>
        </span>
        <span>
            <?= get_field("5_feature_label") ?>
        </span>
        <span>
            <?= get_field("6_feature_label") ?>
        </span>
    </div>
    <div class="Variable-value">
        <span>
            <?= get_field("1_feature_value") ?>
        </span>
        <span>
            <?= get_field("2_feature_value") ?>
        </span>
        <span>
            <?= get_field("3_feature_value") ?>
        </span>
        <span>
            <?= get_field("4_feature_value") ?>
        </span>
        <span>
            <?= get_field("5_feature_value") ?>
        </span>
        <span>
            <?= get_field("6_feature_value") ?>
        </span>
    </div>
    <div class="Variable-name">
        <span>
            <?= get_field("7_feature_label") ?>
        </span>
        <span>
            <?= get_field("8_feature_label") ?>
        </span>
        <span>
            <?= get_field("9_feature_label") ?>
        </span>
        <span>
            <?= get_field("10_feature_label") ?>
        </span>
        <span>
            <?= get_field("11_feature_label") ?>
        </span>
        <span>
            <?= get_field("12_feature_label") ?>
        </span>
    </div>
    <div class="Variable-value">
        <span>
            <?= get_field("7_feature_value") ?>
        </span>
        <span>
            <?= get_field("8_feature_value") ?>
        </span>
        <span>
            <?= get_field("9_feature_value") ?>
        </span>
        <span>
            <?= get_field("10_feature_value") ?>
        </span>
        <span>
            <?= get_field("11_feature_value") ?>
        </span>
        <span>
            <?= get_field("12_feature_value") ?>
        </span>
    </div>
</div>

<div class="tab" id="tab2">product description</div>
<div id="tab2Content" class="tab-content">
    <?= the_content() ?>
</div>

<div class="tab" id="tab3">product catalog</div>
<div id="tab3Content" class="tab-content">
    <p>Click to download the catalog</p>
    <a href="<?= get_field("catalog"); ?>" class="download">

        <span> Download
            <?php get_template_part('/templates/components/svg/icon-download-pdf') ?>
        </span>
    </a>
</div>
<div class="tab" id="tab4">frequently asked question</div>
<div id="tab4Content" class="tab-content">
    <div>
        <?php
        get_template_part(
            'templates/components/cards/product-cards/product-question',
            null,
        );
        ?>
    </div>
</div>
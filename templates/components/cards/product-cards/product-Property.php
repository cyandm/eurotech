<?php
$variable_name1 = [];
$variable_value1 = [];
$variable_name2 = [];
$variable_value2 = [];
for ($i = 1; $i <= 6; $i++) {
    $row_name = get_field($i . '_feature_label');
    if (isset ($row_name) && $row_name != '')
        array_push($variable_name1, $row_name);
    $row_value = get_field($i . '_feature_value');
    if (isset ($row_value) && $row_value != '')
        array_push($variable_value1, $row_value);
}
for ($i = 7; $i <= 12; $i++) {
    $row_name = get_field($i . '_feature_label');
    if (isset ($row_name) && $row_name != '')
        array_push($variable_name2, $row_name);

    $row_value = get_field($i . '_feature_value');
    if (isset ($row_value) && $row_value != '')
        array_push($variable_value2, $row_value);
}
$product_content = get_the_content();
?>
<?php if (count($variable_name1) > 0 || count($variable_value1) > 0 || count($variable_name2) > 0 || count($variable_value2) > 0): ?>
    <div class="tab" name="tab" id="tab1">specifications</div>
    <div id="tab1Content" name="tab-content" class="tab-content">
        <?php if (count($variable_name1) > 0): ?>
            <div class="Variable-name">
                <?php
                foreach ($variable_name1 as $name) {
                    echo '<span>' . $name . '</span>';
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if (count($variable_value1) > 0): ?>
            <div class="Variable-value">
                <?php
                foreach ($variable_value1 as $value) {
                    echo '<span>' . $value . '</span>';
                }
                ?>
            </div>
        <?php endif; ?>
        <?php if (count($variable_name2) > 0): ?>
            <div class="Variable-name">
                <?php
                foreach ($variable_name2 as $name) {
                    echo '<span>' . $name . '</span>';
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if (count($variable_value2) > 0): ?>
            <div class="Variable-value">
                <?php
                foreach ($variable_value2 as $value) {
                    echo '<span>' . $value . '</span>';
                }
                ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
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
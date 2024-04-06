<?php
$variable_name = [];
$variable_value = [];

for ($i = 1; $i <= 7; $i++) {
    $row_name = get_field($i . '_feature_label');
    if (isset($row_name) && $row_name != '')
        array_push($variable_name, $row_name);
    $row_value = get_field($i . '_feature_value');
    if (isset($row_value) && $row_value != '')
        array_push($variable_value, $row_value);
}
?>
<div class="products-changing">
    <?php if (!empty(get_field('1_feature_label')) && !empty(get_field('1_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('1_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('1_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('2_feature_label')) && !empty(get_field('2_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('2_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('2_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('3_feature_label')) && !empty(get_field('3_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('3_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('3_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('4_feature_label')) && !empty(get_field('4_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('4_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('4_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('5_feature_label')) && !empty(get_field('5_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('5_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('5_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('6_feature_label')) && !empty(get_field('6_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('6_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('6_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if (!empty(get_field('7_feature_label')) && !empty(get_field('7_feature_value'))): ?>
        <div class="variable">
            <div class="Variable-name">
                <?= get_field('7_feature_label'); ?>
            </div>
            <div class="Variable-value">
                <?= get_field('7_feature_value'); ?>
            </div>
        </div>
    <?php endif; ?>


</div>
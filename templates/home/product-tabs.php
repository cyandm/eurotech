<?php
$frontPageId = get_option('page_on_front');
$catsGroup = get_field("home_products_cats", $frontPageId);

if (!isset($catsGroup))
  return;

if (!is_array($catsGroup))
  return;
?>

<section class="products-tabs">
  <div class="container">
    <nav class="tabs">
      <ul>
        <?php foreach ($catsGroup as $termId) : ?>
          <?php $term = get_term_by('id', $termId, 'product-category'); ?>

          <li data-tab="<?= $term->slug ?>"><?= $term->name ?></li>
        <?php endforeach; ?>
      </ul>

      <a href="<?= site_url() . '/product' ?>" class="button-primary">View All</a>
    </nav>

    <div class="tabs-content">
      <?php foreach ($catsGroup as $termId) : ?>
        <?php
        $term = get_term_by('id', $termId, 'product-category');
        $term_query = new WP_Query(array(
          'post_type' => 'product',
          'posts_per_page' => 4,
          'tax_query' => array(
            array(
              'taxonomy' => 'product-category',
              'field' => "slug",
              'terms' => $term->slug
            )
          )
        ));
        ?>

        <div class="tab-content products" data-tab="<?= $term->slug ?>">
          <?php
          while ($term_query->have_posts()) :
            $term_query->the_post();
            get_template_part('templates/components/cards/product-cards/suggest-product', null, []);
          endwhile; ?>
        </div>
        <?php wp_reset_postdata() ?>
      <?php endforeach; ?>
    </div>

    <a href="<?= site_url() . '/product' ?>" class="button-primary">View All</a>
  </div>
</section>
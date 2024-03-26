<?php get_header(); ?>
<?php
$banner = get_field("product_archive_banner");
$product = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 10,
	'post__not_in' => [get_the_ID()],
]);
$post_id = isset ($args['post_id']) ? $args['post_id'] : get_the_ID();
$product_cat = get_the_terms($post_id, 'product_cat');

?>
<main class="archive-product">
	<div class="banner"
		style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/product-archive.png' ?>);">
		<div class="container">
			<p>Our doors add beauty and elegance to your office</p>
		</div>
	</div>
	<div class="container">
		<div class="single-sidebar">
			<?php
			get_template_part(
				'templates/components/sidebar/products-sidebar',
				null,
			);
			?>
		</div>
		<div class="allproduct">
			<div class="like-product">
				<h2>
					<?= is_array($product_cat) ? $product_cat[0]->name : '';

					?>
				</h2>
				<div class="products">
					<?php
					while (have_posts()) {
						the_post();
						$post_id = get_the_ID();
						get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $post_id]);
					}
					?>
					<?php wp_reset_postdata() ?>

				</div>
			</div>
		</div>
	</div>
	<?php
	echo "<div class='pagination container'>" . paginate_links(
		array(
			'total' => $product->max_num_pages,
			'prev_next' => false,
			'mid_size' => 1,
		)
	) . "</div>";
	?>
</main>
<?php get_footer() ?>
<?php get_header(); ?>
<?php
$banner = get_field("product_archive_banner");
$product = new WP_Query([
	'post_type' => 'product',
	'posts_per_page' => 10,
	'post__not_in' => [get_the_ID()],
]);
?>
<main class="archive-product">
	<div class="banner"
		style="background-image: url(<?= get_stylesheet_directory_uri() . '/assets/img/product-archive.png' ?>);">
		<p class="container">Our doors add beauty and elegance to your office</p>
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
				<h2>Exterior Door</h2>
				<div class="products">
					<?php
					while ($product->have_posts()) {
						$product->the_post();
						$post_id = get_the_ID();
						get_template_part('/templates/components/cards/product-cards/suggest', 'product', ['post_id' => $post_id]);
					}
					?>
					<?php wp_reset_postdata() ?>


					<?php
					echo "<div class='pagination'>" . paginate_links(
						array(
							'total' => $product->max_num_pages,
							'prev_next' => false,
							'mid_size' => 1,
						)
					) . "</div>";
					?>

				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer() ?>
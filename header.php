<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>

	<div class="header">
		<div class="container">
			<div class="contain">
				<div class="logo-contain">
					<?php the_custom_logo() ?>
				</div>
				<div class="header-search mb-hide">
					<?php
					get_template_part(
						'templates/components/forms/search-box',
						null,
					);
					?>
				</div>
			</div>
			<div class="menu-nav mb-hide">
				<?php wp_nav_menu([
					'theme_location' => 'header'
				]) ?>
			</div>
			<div class=" mobile_nav_menu hide">
				<i class="iconsax" icon-name="hamburger-menu" fill="red"></i>
			</div>
		</div>
	</div>

	<?php wp_body_open() ?>
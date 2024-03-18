<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>

	<header>
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
				<i class="iconsax open-pop" icon-name="hamburger-menu" fill="red"></i>
			</div>
		</div>
		<div class="menu-popup">
			<div class="main">
				<p class="close"><i class="iconsax close-pop" icon-name="x" fill="red"></i></p>
				<div class="header-search">
					<?php
					get_template_part(
						'templates/components/forms/search-box',
						null,
					);
					?>
				</div>
				<?php wp_nav_menu([
					'theme_location' => 'header'
				]) ?>
			</div>
		</div>
	</header>

	<?php wp_body_open() ?>
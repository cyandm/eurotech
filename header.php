<!DOCTYPE html>
<html <?php language_attributes() ?> dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
</head>

<body <?php body_class() ?>>
	<header>
		<div class="desktop-header container">
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

			<div id="mobile-menu-modal-open" class="mobile_nav_menu">
				<i class="iconsax open-pop" icon-name="hamburger-menu" fill="red"></i>
			</div>
		</div>

		<div id="mobile-menu-modal" class="" data-close="close">
			<div class="container">
				<div class="mobile-menu-top">
					<div class="logo">
						<?php the_custom_logo() ?>
					</div>

					<div class="close" data-close="close">
						<i class="iconsax" icon-name="x"></i>
					</div>
				</div>

				<div class="mobile-menu-search header-search">
					<?php get_template_part('templates/components/forms/search-box', null, []); ?>
				</div>

				<nav class="mobile-menu-nav">
					<?php wp_nav_menu([
						'theme_location' => 'header'
					]) ?>
				</nav>
			</div>
		</div>
	</header>

	<?php wp_body_open() ?>
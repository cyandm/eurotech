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
		<div class="main">
			<div class="logo-contain">
				<?php the_custom_logo() ?>
			</div>
			<div class="search-box">
				<?php
				get_template_part(
					'templates/components/forms/search-box',
					null,
				);
				?>
			</div>
		</div>
	</div>
	<?php wp_body_open() ?>
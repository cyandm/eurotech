<!DOCTYPE html>
<html <?php language_attributes() ?> dir="ltr">

<head>
	<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "o7o2d8t7c8");
</script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head() ?>
	<meta name="google-site-verification" content="gp2LakDRuVRy3QImre3elnwP-ry7UBA57nTUCfl8tfc" />
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

				<?php wp_nav_menu([
				
					'theme_location' => 'header',
					'menu_class' => 'primary mb-hide'
				]) ?>

			<div id="mobile-menu-modal-open" class="mobile_nav_menu">
				<i class="iconsax open-pop" icon-name="hamburger-menu" fill="red"></i>
			</div>
		</div>

		<div id="mobile-menu-modal" class="" data-close="close">
			<div class="container">
					<div class="close mobile-menu-top" data-close="close">
						<i class="iconsax" icon-name="x"></i>
					</div>
				<div class="mobile-menu-search header-search">
					<?php get_template_part('templates/components/forms/search-box', null, []); ?>
				</div>

				<nav class="mobile-menu-nav">
					<?php wp_nav_menu([
						'theme_location' => 'header-mobile'
					]) ?>
				</nav>
			</div>
		</div>
	</header>

	<?php wp_body_open() ?>
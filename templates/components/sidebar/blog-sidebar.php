<?php
$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$popular_post = get_field( 'popular_post' );
$num = 01;

?>
<div class="popular-blog">

	<h3> <i class="iconsax"
		   icon-name="star"
		   fill="red"></i> most Popular posts</h3>
	<?php
	foreach ( $popular_post as $blog_id ) {

		?>
		<?php get_template_part( '/templates/components/cards/blog-cards/popular', 'blog', [ 'post_id' => $blog_id, 'counter' => $num ] );
		$num++;
	} ?>

	<?php wp_reset_postdata() ?>
</div>
<h3 class="">Today’s Pic</h3>
<div class="today-pic">
	<!-- <a href="<?= home_url() . '/inspiration' ?>" ><img src="<?php echo get_field( "first_pic" ); ?>" /></a> -->
	<a href="<?= home_url() . '/inspiration' ?>"><img src="<?php echo get_field( "secound_pic" ); ?>" /></a>
	<a href="<?= home_url() . '/inspiration' ?>"><img src="<?php echo get_field( "third_pic" ); ?>" /></a>
	<a href="<?= home_url() . '/inspiration' ?>"><img src="<?php echo get_field( "fourth_pic" ); ?>" /></a>
	<a href="<?= home_url() . '/inspiration' ?>"><img src="<?php echo get_field( "fifth_pic" ); ?>" /></a>
	<a href="<?= home_url() . '/inspiration' ?>"><img src="<?php echo get_field( "sixth_pic" ); ?>" /></a>
</div>
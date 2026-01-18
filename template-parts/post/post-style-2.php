<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

add_filter( 'sodalicious/post-media-image-size', function() {
	return 'sodalicious-800x600_crop';
} );

$post_class = 'vlt-post vlt-post--style-2';

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

?>

<article <?php post_class( $post_class ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-media">

			<?php get_template_part( 'template-parts/post/media/post-media', 'image' ); ?>

		</div>

	<?php endif; ?>

	<?php

		if ( $format !== 'link' && $format !== 'quote' ) {
			get_template_part( 'template-parts/post/partials/partial-post', 'meta-filled' );
		}

	?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>

		</header>
		<!-- /.vlt-post-header -->

		<div class="vlt-post-excerpt">

			<?php echo sodalicious_get_trimmed_content( 22 ); ?>

		</div>
		<!-- /.vlt-post-excerpt -->

		<footer class="vlt-post-footer">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'read-more-link' ); ?>

		</footer>
		<!-- /.vlt-post-footer -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->
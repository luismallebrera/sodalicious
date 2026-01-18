<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$post_class = 'vlt-post vlt-post--style-5';

$size = 'sodalicious-800x600_crop';

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

?>

<article <?php post_class( $post_class ); ?>>

	<?php get_template_part( 'template-parts/post/partials/partial-post', 'category-outside' ); ?>

	<?php if ( has_post_thumbnail() ) : ?>

		<div class="vlt-post-media">

			<div class="vlt-post-media__image">

				<a href="<?php the_permalink(); ?>">

					<?php the_post_thumbnail( apply_filters( 'sodalicious/post-media-image-size', $size ), array( 'loading' => 'lazy' ) ); ?>

				</a>

			</div>

		</div>

	<?php endif; ?>

	<div class="vlt-post-content">

		<header class="vlt-post-header">

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'title' ); ?>

			<?php get_template_part( 'template-parts/post/partials/partial-post', 'meta-small' ); ?>

		</header>
		<!-- /.vlt-post-header -->

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->
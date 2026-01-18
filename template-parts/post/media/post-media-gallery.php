<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$size = 'full';
$images[] = get_post_thumbnail_id( get_the_ID() );
$post_gallery_images = sodalicious_get_field( 'post_gallery_images' );

if ( $post_gallery_images ) {
	foreach( $post_gallery_images as $image ) {
		$images[] = $image['ID'];
	}
}

?>

<?php if ( is_single() ) : ?>

	<div class="vlt-post-media__gallery swiper-container swiper">

		<div class="swiper-wrapper">

			<?php

				if ( $images ) :

					foreach( $images as $image ) :

						echo '<div class="swiper-slide">';
						if ( ! is_single() ) :
						echo '<a href="' . get_permalink() . '">';
						endif;
						echo wp_get_attachment_image( $image, apply_filters( 'sodalicious/post-media-image-size', $size ), false, array( 'loading' => 'lazy' ) );
						if ( ! is_single() ) :
						echo '</a>';
						endif;
						echo '</div>';

					endforeach;

				endif;

			?>

		</div>

		<div class="vlt-swiper-pagination"></div>

	</div>

<?php else: ?>

	<?php get_template_part( 'template-parts/post/media/post-media', 'image' ); ?>

<?php endif; ?>
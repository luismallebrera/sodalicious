<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

if ( $format == 'link' || $format == 'quote' ) {
	return;
}

$size = 'full';

add_filter( 'sodalicious/post-media-image-size', function() {
	return 'sodalicious-800x600_crop';
} );

?>

	<div class="vlt-post-content">

		<div class="vlt-post-date">
			<span><?php echo get_the_date( 'd' ); ?></span>
			<span><?php echo get_the_date( 'M' ); ?></span>
		</div>
		<!-- /.vlt-post-date -->

		<?php if ( has_post_thumbnail() ) : ?>

			<h3 class="vlt-post-title" data-cursor="<?php esc_attr_e( 'View', 'sodalicious' ); ?>" data-tooltip-image="<?php the_post_thumbnail_url( apply_filters( 'sodalicious/post-media-image-size', $size ) ); ?>">

		<?php else: ?>

			<h3 class="vlt-post-title">

		<?php endif; ?>

			<?php if ( is_sticky() ) { echo '<i class="ri-bookmark-line"></i>'; } ?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

		</h3>
		<!-- /.vlt-post-title -->

		<?php if ( sodalicious_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

			<div class="vlt-post-category"><?php echo sodalicious_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></div>
			<!-- /.vlt-post-category -->

		<?php endif; ?>

	</div>
	<!-- /.vlt-post-content -->

</article>
<!-- /.vlt-post -->
<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$post_class = 'vlt-post vlt-post--style-4';

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

if ( $format == 'link' ) {

	get_template_part( 'template-parts/post/post', 'link' );

	return;

} elseif( $format == 'quote' ) {

	get_template_part( 'template-parts/post/post', 'quote' );

	return;

}

?>

<article <?php post_class( $post_class ); ?>>

	<div class="vp-portfolio__item-img-wrap">

		<div class="vp-portfolio__item-img">

			<?php if ( $args['url'] ) { ?>

				<a href="<?php echo esc_url( $args['url'] ); ?>">
					<?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>
				</a>

			<?php } else {
				echo wp_kses( $args['image'], $args['image_allowed_html'] );
			}
			?>

		</div>

	</div>
	<!-- /.vp-portfolio__item-img-wrap -->
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

if ( $args['title'] ) { ?>

	<?php if ( $args['image_id'] ) : ?>

		<h5 class="vp-portfolio__item-meta-title" data-cursor="<?php esc_attr_e( 'View', 'sodalicious' ); ?>" data-tooltip-image="<?php echo wp_get_attachment_image_src( $args['image_id'], 'sodalicious-800x600_crop' )[0]; ?>">

	<?php else: ?>

		<h5 class="vp-portfolio__item-meta-title">

	<?php endif; ?>

		<?php if ( $args['url'] ) : ?>

			<a href="<?php echo esc_url( $args['url'] ); ?>">

		<?php endif; ?>

		<?php echo esc_html( $args['title'] ); ?>

		<?php if ( $args['url'] ) : ?>

			</a>

		<?php endif; ?>

	</h5>

<?php }
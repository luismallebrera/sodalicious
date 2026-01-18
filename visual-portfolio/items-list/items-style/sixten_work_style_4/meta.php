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


if ( $args['title'] ) {

	// Show Categories.
	if ( $opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] ) ) { ?>

		<div class="vp-portfolio__item-meta-categories vlt-display-2">
			<?php
			// phpcs:ignore
			$count = $opts['categories_count'];

			// phpcs:ignore
			foreach ( $args['categories'] as $category ) {
				if ( ! $count ) {
					break;
				}
				?>
				<div class="vp-portfolio__item-meta-category">
					<a href="<?php echo esc_html( $category['url'] ); ?>">
						<?php echo esc_html( $category['label'] ); ?>
					</a>
				</div>
				<?php
				$count--;
			}
			?>
		</div>

		<?php
	}

	?>

	<?php if ( $args['image_id'] ) : ?>

		<h5 class="vp-portfolio__item-meta-title" data-tooltip-image="<?php echo wp_get_attachment_image_src( $args['image_id'], 'skape-800x600_crop' )[0]; ?>">

	<?php else: ?>

		<h5 class="vp-portfolio__item-meta-title">

	<?php endif; ?>

		<?php if ( $args['url'] ) : ?>

			<a href="<?php echo esc_url( $args['url'] ); ?>" data-cursor="<?php esc_attr_e( 'View', 'sodalicious' ); ?>">

		<?php endif; ?>

		<?php echo esc_html( $args['title'] ); ?>

		<?php if ( $args['url'] ) : ?>

			</a>

		<?php endif; ?>

	</h5>
	<!-- /.vlt-work-title -->

<?php }
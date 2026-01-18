<?php
/**
 * Item meta template.
 *
 * @var $args
 * @var $opts
 * @package @@plugin_name
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignore
$tag = 'a';
if ( ! $args['url'] ) {
	// phpcs:ignore
	$tag = 'span';
}

// phpcs:ignore
$show_meta =
	$opts['show_title'] && $args['title'] ||
	$opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] );

?>

<figcaption class="vp-portfolio__item-overlay vp-portfolio__item-align-<?php echo esc_attr( $opts['align'] ); ?>">

	<<?php echo esc_html( $tag ); ?>

		<?php if ( $args['url'] ) : ?>

			href="<?php echo esc_url( $args['url'] ); ?>"

			<?php if ( isset( $args['url_target'] ) && $args['url_target'] ) : ?>
				target="<?php echo esc_attr( $args['url_target'] ); ?>"
				rel="noopener noreferrer"
			<?php endif; ?>

		<?php endif; ?>

		class="vp-portfolio__item-meta">

		<?php if ( $show_meta ) : ?>

			<?php

			// Show Title.
			if ( $opts['show_title'] && $args['title'] ) { ?>

				<h5 class="vp-portfolio__item-meta-title" data-marquee>

					<span data-marquee-text="<?php echo esc_attr( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></span>
					<span data-marquee-text="<?php echo esc_attr( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></span>
					<span data-marquee-text="<?php echo esc_attr( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></span>
					<span data-marquee-text="<?php echo esc_attr( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></span>

				</h5>

				<?php
			}

			// Show Categories.
			if ( $opts['show_categories'] && $args['categories'] && ! empty( $args['categories'] ) ) {

				?>
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
								<?php echo esc_html( $category['label'] ); ?>
							</div>
							<?php
							$count--;
						}
					?>
				</div>
				<?php
			}

		endif; ?>

	</<?php echo esc_html( $tag ); ?>>

</figcaption>
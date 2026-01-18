<?php
/**
 * Default pagination template.
 *
 * @var $args
 * @package visual-portfolio
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="<?php echo esc_attr( $args['class'] ); ?> vp-pagination__style-sodalicious" data-vp-pagination-type="<?php echo esc_attr( $args['type'] ); ?>">
	<div class="vp-pagination__item">
		<a class="vp-pagination__load-more" href="<?php echo esc_url( $args['next_page_url'] ); ?>">
			<span class="vp-pagination__load-more-load"><?php echo esc_html( $args['text_load'] ) ? esc_html( $args['text_load'] ) : '<i class="ri-arrow-down-line"></i>'; ?></span>
			<span class="vp-pagination__load-more-loading"><?php echo esc_html( $args['text_load'] ) ? esc_html( $args['text_loading'] ) : '<i class="ri-loader-2-line"></i>'; ?></span>
			<span class="vp-pagination__load-more-no-more"><?php echo esc_html( $args['text_load'] ) ? esc_html( $args['text_end_list'] ) : '<i class="ri-arrow-down-line"></i>'; ?></span>
		</a>
	</div>
</div>
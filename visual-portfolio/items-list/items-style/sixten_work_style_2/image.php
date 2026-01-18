<?php
/**
 * Item image template.
 *
 * @var $args
 * @var $opts
 * @package @@plugin_name
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="vp-portfolio__item-img-wrap">
	<div class="vp-portfolio__item-img">
		<noscript><?php echo wp_kses( $args['image_noscript'], $args['image_allowed_html'] ); ?></noscript>
		<?php echo wp_kses( $args['image'], $args['image_allowed_html'] ); ?>
	</div>
</div>
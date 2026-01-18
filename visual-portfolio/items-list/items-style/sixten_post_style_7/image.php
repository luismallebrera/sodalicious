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

$post_class = 'vlt-post vlt-post--style-7';

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
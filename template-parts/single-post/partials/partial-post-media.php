<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

add_filter( 'sodalicious/post-media-image-size', function() {
	return 'sodalicious-1280x853_crop';
} );

switch( $format ) {
	case 'link':
		get_template_part( 'template-parts/post/media/post-media', 'link' );
		break;
	case 'quote':
		get_template_part( 'template-parts/post/media/post-media', 'quote' );
		break;
	case 'video':
		get_template_part( 'template-parts/post/media/post-media', 'video' );
		break;
	case 'audio':
		get_template_part( 'template-parts/post/media/post-media', 'audio' );
		break;
	case 'gallery':
		get_template_part( 'template-parts/post/media/post-media', 'gallery' );
		break;
}
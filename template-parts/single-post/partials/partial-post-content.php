<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<div class="vlt-content-markup">
	<?php the_content(); ?>
</div>

<div class="clearfix"></div>

<?php
	wp_link_pages( array(
		'before' => '<div class="vlt-link-pages has-black-color"><h6>' . esc_html__( 'Pages: ', 'sodalicious' ) . '</h6><div class="vlt-display-2">',
		'after' => '</div></div>',
		'separator' => '<span class="sep">|</span>',
		'nextpagelink' => esc_html__( 'Next page', 'sodalicious' ),
		'previouspagelink' => esc_html__( 'Previous page', 'sodalicious' ),
		'next_or_number' => 'next'
	) );
?>
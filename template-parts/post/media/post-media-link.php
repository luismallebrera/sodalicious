<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$post_link_text = sodalicious_get_field( 'post_link_text' );
$post_link_url = ! empty( sodalicious_get_field( 'post_link_url' ) ) ? sodalicious_get_field( 'post_link_url' ) : get_permalink();

?>

<div class="vlt-post-link">

	<h5 class="vlt-post-link__text"><?php echo esc_html( $post_link_text ); ?></h5>
	<a href="<?php echo esc_url( $post_link_url ); ?>" class="vlt-post-link__link" title="<?php the_title_attribute(); ?>"></a>

</div>
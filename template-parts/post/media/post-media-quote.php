<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$post_quote_text = sodalicious_get_field( 'post_quote_text' );
$post_quote_author = sodalicious_get_field( 'post_quote_author' );

?>

<div class="vlt-post-quote">

	<h5 class="vlt-post-quote__text"><?php echo esc_html( $post_quote_text ); ?></h5>

	<?php if ( ! empty( $post_quote_author ) ) : ?>
		<span class="vlt-post-quote__author"><?php echo esc_html( $post_quote_author ); ?></span>
	<?php endif; ?>

	<?php if ( ! is_single() ) : ?>

		<a href="<?php the_permalink(); ?>" class="vlt-post-quote__link" title="<?php the_title_attribute(); ?>"></a>

	<?php endif; ?>

</div>
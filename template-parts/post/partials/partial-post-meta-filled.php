<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<div class="vlt-post-meta vlt-post-meta--filled">

	<span><time datetime="<?php the_time( 'c' ); ?>"><?php echo get_the_date(); ?></time></span>

	<?php if ( sodalicious_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>
		<span><?php echo sodalicious_get_post_taxonomy( get_the_ID(), 'category', ', ' ); ?></span>
	<?php endif; ?>

</div>
<!-- /.vlt-post-meta -->
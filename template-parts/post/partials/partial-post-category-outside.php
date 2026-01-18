<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<?php if ( sodalicious_get_post_taxonomy( get_the_ID(), 'category' ) ) : ?>

	<div class="vlt-post-category-outside">

		<?php echo sodalicious_get_post_taxonomy( get_the_ID(), 'category', ' ' ); ?>

	</div>
	<!-- /.vlt-post-category-outside -->

<?php endif; ?>
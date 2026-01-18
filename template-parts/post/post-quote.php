<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$post_class = 'vlt-post';

?>

<article <?php post_class( $post_class ); ?>>

	<?php get_template_part( 'template-parts/post/media/post-media', 'quote' ); ?>

</article>
<!-- /.vlt-post -->
<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$size = 'full';

?>

<div class="vlt-post-media__image">

	<?php if ( ! is_single() ) : ?><a href="<?php the_permalink(); ?>"><?php endif; ?>

		<?php the_post_thumbnail( apply_filters( 'sodalicious/post-media-image-size', $size ), array( 'loading' => 'lazy' ) ); ?>

	<?php if ( ! is_single() ) : ?></a><?php endif; ?>

</div>
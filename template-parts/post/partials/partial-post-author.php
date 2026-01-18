<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<div class="vlt-post-author">

	<div class="vlt-post-author__avatar">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
			<?php echo get_avatar( get_the_author_meta( 'email' ), 90, '', '', [
				'extra_attr' => 'loading="lazy"'
			] ); ?>
		</a>

	</div>

	<div class="vlt-post-author__name">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
			<?php the_author(); ?>
		</a>

	</div>

</div>
<!-- /.vlt-post-author -->
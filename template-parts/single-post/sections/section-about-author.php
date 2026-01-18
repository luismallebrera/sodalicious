<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<div class="vlt-about-author">

	<div class="vlt-about-author__avatar">

		<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
			<?php echo get_avatar( get_the_author_meta( 'email' ), 200, '', '', array( 'extra_attr' => 'loading=lazy' ) ); ?>
		</a>

	</div>

	<div class="vlt-about-author__content">

		<h5 class="vlt-about-author__title">

			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>">
				<?php the_author(); ?>
			</a>

		</h5>

		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<p class="vlt-about-author__text"><?php the_author_meta( 'description' ); ?></p>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'url' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 internet" href="<?php the_author_meta( 'url' ); ?>"><i class="socicon-internet"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'instagram' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 instagram" href="<?php the_author_meta( 'instagram' ); ?>"><i class="socicon-instagram"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'twitter' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 twitter" href="<?php the_author_meta( 'twitter' ); ?>"><i class="socicon-twitter"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'facebook' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 facebook" href="<?php the_author_meta( 'facebook' ); ?>"><i class="socicon-facebook"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'pinterest' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 pinterest" href="<?php the_author_meta( 'pinterest' ); ?>"><i class="socicon-pinterest"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'tumblr' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 tumblr" href="<?php the_author_meta( 'tumblr' ); ?>"><i class="socicon-tumblr"></i></a>
		<?php endif; ?>

		<?php if ( get_the_author_meta( 'email' ) ): ?>
			<a target="_blank" class="vlt-social-icon vlt-social-icon--style-2 mail" href="mailto:<?php the_author_meta( 'email' ); ?>"><i class="socicon-mail"></i></a>
		<?php endif; ?>

	</div>

</div>
<!-- /.vlt-about-author -->
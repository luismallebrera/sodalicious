<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<?php if ( get_the_tags() ) : ?>

	<div class="vlt-post-tags">

		<?php the_tags( '', '' ); ?>

	</div>
	<!-- /.vlt-post-tags -->

<?php endif; ?>

<?php if ( function_exists( 'sodalicious_get_post_share_buttons' ) && sodalicious_get_theme_mod( 'show_share_post' ) == 'show' ) : ?>

	<div class="vlt-post-share">

		<h6 class="vlt-post-share__title"><?php esc_html_e( 'Share this:', 'sodalicious' ); ?></h6>

		<div class="vlt-post-share__links">

			<?php echo sodalicious_get_post_share_buttons( get_the_ID() ); ?>

		</div>

	</div>
	<!-- /.vlt-post-share -->

<?php endif; ?>
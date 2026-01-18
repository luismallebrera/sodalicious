<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<article <?php post_class( 'vlt-page vlt-page--empty' ); ?>>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ): ?>

		<p><?php esc_html_e( 'Ready to publish your first post?', 'sodalicious' ); ?></p>
		<a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>" class="vlt-btn vlt-btn--effect vlt-btn--secondary vlt-btn--sm"><?php esc_html_e( 'Get started here', 'sodalicious' ); ?></a>

	<?php elseif ( is_search() ): ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'sodalicious' ); ?></p>

	<?php else: ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'sodalicious' ); ?></p>

	<?php endif; ?>

</article>
<!-- /.vlt-page -->
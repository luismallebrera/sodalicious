<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$format = get_post_format();

if ( false == $format ) {
	$format = 'standard';
}

?>

<main class="vlt-main">

	<?php

		if ( has_post_thumbnail() ) {
			get_template_part( 'template-parts/single-post/media/media', 'style-1' );
		}

	?>

	<div class="vlt-page-content vlt-page-content--padding">

		<div class="container">

			<div class="row">

				<div class="col-lg-8 offset-lg-2">

					<article <?php post_class( 'vlt-single-post vlt-single-post--style-1' ); ?>>

						<header class="vlt-single-post__header">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'title' ); ?>
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>
						</header>
						<!-- /.vlt-single-post__header -->

						<?php if ( has_post_thumbnail() && $format !== 'standard' ) : ?>

							<div class="vlt-single-post__media">
								<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'media' ); ?>
							</div>
							<!-- /.vlt-single-post__media -->

						<?php endif; ?>

						<div class="vlt-single-post__content clearfix">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'content' ); ?>
						</div>
						<!-- /.vlt-single-post__content -->

						<footer class="vlt-single-post__footer">
							<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'footer' ); ?>
						</footer>
						<!-- /.vlt-single-post__footer -->

						<?php

							if ( sodalicious_get_theme_mod( 'about_author' ) == 'show' ) {
								get_template_part( 'template-parts/single-post/sections/section', 'about-author' );
							}

						?>

					</article>

				</div>

			</div>

		</div>

		<?php

			if ( sodalicious_get_theme_mod( 'also_like_posts' ) == 'show' ) {
				get_template_part( 'template-parts/single-post/sections/section', 'also-like-3-columns' );
			}

		?>

	</div>
	<!-- /.vlt-page-content -->

	<?php

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		$acf_post_navigation = sodalicious_get_theme_mod( 'post_custom_navigation', true );

		if ( sodalicious_get_theme_mod( 'post_navigation' ) == 'show' ) {
			echo sodalicious_get_post_navigation( sodalicious_get_theme_mod( 'post_navigation_style', $acf_post_navigation ) );
		}

	?>

</main>
<!-- /.vlt-main -->

<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$column_content_class = is_active_sidebar( 'blog_sidebar' ) ? 'col-lg-7' : 'col-lg-7 offset-lg-2';

?>

<div class="vlt-page-title vlt-page-title--style-1">

	<div class="container">

		<div class="row">

			<div class="<?php echo sodalicious_sanitize_class( $column_content_class ); ?>">

				<h1 class="vlt-page-title__title"><?php echo esc_html( sodalicious_get_theme_mod( 'blog_title' ) ); ?></h1>

				<?php echo sodalicious_get_breadcrumbs(); ?>

			</div>

		</div>

	</div>

</div>
<!-- /.vlt-page-title -->
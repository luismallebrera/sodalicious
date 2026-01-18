
<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$column_content_class = 'col-lg-7';

$args = [
	'delimiter' => '<span class="sep">/</span>',
	'wrap_before' => '<nav class="vlt-breadcrumbs">',
	'wrap_after' => '</nav>',
];

?>

<div class="vlt-page-title vlt-page-title--style-1">

	<div class="container">

		<div class="row">

			<div class="<?php echo sodalicious_sanitize_class( $column_content_class ); ?>">

				<h1 class="vlt-page-title__title"><?php the_title(); ?></h1>

				<?php woocommerce_breadcrumb( $args ); ?>

			</div>

		</div>

	</div>

</div>
<!-- /.vlt-page-title -->
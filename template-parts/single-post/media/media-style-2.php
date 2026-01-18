<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$size = 'sodalicious-1920x960_crop';

?>

<div class="vlt-post-media-title vlt-post-media-title--style-2 jarallax">

	<?php the_post_thumbnail( $size, array( 'class' => 'jarallax-img', 'loading' => 'lazy' ) ); ?>

	<div class="vlt-post-media-title__overlay"></div>

	<div class="container">

		<div class="row">

			<div class="col-lg-8 offset-lg-2">

				<div class="lax" data-lax-translate-y="0 0, (-elh*2) elh" data-lax-opacity="0 1, (-elh*2) 0" data-lax-anchor=".vlt-post-media-title">

					<h1 class="vlt-post-title"><?php the_title(); ?></h1>

					<?php get_template_part( 'template-parts/single-post/partials/partial-post', 'meta' ); ?>

				</div>

			</div>

		</div>

	</div>

</div>
<!-- /.vlt-post-media-title -->
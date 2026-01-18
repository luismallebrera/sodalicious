<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'meta_key' => 'sodalicious_post_views_count',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'post__not_in' => array( get_the_ID() ),
	'ignore_sticky_posts' => true,
);

$new_query = new WP_Query( $args );

?>

<div class="vlt-also-like-posts">

	<div class="container">

		<div class="vlt-isotope-grid" data-columns="3" data-layout="masonry" data-x-gap="30|30" data-y-gap="30|30">

			<div class="grid-sizer"></div>

			<?php

				if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post();

					echo '<div class="grid-item">';

					get_template_part( 'template-parts/post/post-style', 'also-like' );

					echo '</div>';

				endwhile; endif;

				wp_reset_postdata();

			?>

		</div>
		<!-- /.vlt-isotope-grid -->

	</div>

</div>
<!-- /.vlt-also-like-posts -->
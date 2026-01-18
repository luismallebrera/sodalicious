<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

?>

<div class="vlt-isotope-grid" data-columns="1" data-layout="masonry" data-x-gap="0|0" data-y-gap="80|80">

	<div class="grid-sizer"></div>

	<?php

		while ( have_posts() ) : the_post();

			$format = get_post_format();

			if ( false == $format ) {
				$format = 'standard';
			}

			echo '<div class="grid-item">';

			switch ( $format ) {
				case 'link':
					get_template_part( 'template-parts/post/post', 'link' );
					break;
				case 'quote':
					get_template_part( 'template-parts/post/post', 'quote' );
					break;
				default:
					get_template_part( 'template-parts/post/post', 'style-1' );
			}

			echo '</div>';

		endwhile;

	?>

</div>
<!-- /.vlt-isotope-grid -->
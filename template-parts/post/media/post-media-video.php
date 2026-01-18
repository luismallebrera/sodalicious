<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

$post_video_data = sodalicious_parse_video_id( sodalicious_get_field( 'post_video_link' ) );

if ( ! empty( $post_video_data ) ) : ?>

	<div class="vlt-post-media__video">

		<?php

			switch ( $post_video_data[0] ) {

				case 'youtube':
					echo '<div class="player" data-plyr-provider="youtube" data-plyr-embed-id="' . esc_attr( $post_video_data[1] ) . '"></div>';
				break;

				case 'vimeo':
					echo '<div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="' . esc_attr( $post_video_data[1] ) . '"></div>';
				break;

				default:
					echo '<video class="player" playsinline controls data-poster="' . get_the_post_thumbnail_url( get_the_ID(), 'full' ) . '">';
					echo '<source src="' . esc_url( $post_video_data[1] ) . '" type="video/mp4" />';
					echo '</video>';
				break;

			}

		?>

	</div>

<?php else: ?>

	<?php get_template_part( 'template-parts/post/media/post-media', 'image' ); ?>

<?php endif; ?>
<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */


/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'sodalicious_body_open' ) ) {
	function sodalicious_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}

/**
 * Sanitize slass tag
 */
if ( ! function_exists( 'sodalicious_sanitize_class' ) ) {
	function sodalicious_sanitize_class( $class, $fallback = null ) {

		if ( is_string( $class ) ) {
			$class = explode( ' ', $class );
		}

		if ( is_array( $class ) && count( $class ) > 0 ) {
			$class = array_map( 'sanitize_html_class', $class );
			return implode( ' ', $class );
		} else {
			return sanitize_html_class( $class, $fallback );
		}

	}
}

/**
 * Sanitize style tag
 */
if ( ! function_exists( 'sodalicious_sanitize_style' ) ) {
	function sodalicious_sanitize_style( $style ) {

		$allowed_html = array(
			'style' => array ()
		);
		return wp_kses( $style, $allowed_html );

	}
}

/**
 * Get trimmed content
 */
if ( ! function_exists( 'sodalicious_get_trimmed_content' ) ) {
	function sodalicious_get_trimmed_content( $max_words = 18 ) {

		global $post;

		$content = $post->post_excerpt != '' ? $post->post_excerpt : $post->post_content;
		$content = preg_replace( '~(?:\[/?)[^/\]]+/?\]~s', '', $content );
		$content = strip_tags( $content );
		$content = strip_shortcodes( $content );
		$words = explode( ' ', $content, $max_words + 1 );
		if ( count( $words ) > $max_words ) {
			array_pop( $words );
			array_push( $words, '...', '' );
		}
		$content = implode( ' ', $words );
		$content = esc_html( $content );

		return apply_filters( 'sodalicious/get_trimmed_content', $content );

	}
}

/**
 * Get page pagination
 */
if ( ! function_exists( 'sodalicious_get_page_pagination' ) ) {
	function sodalicious_get_page_pagination( $query = null, $paginated = 'numeric' ) {

		if ( $query == null ) {
			global $wp_query;
			$query = $wp_query;
		}

		$page = $query->query_vars[ 'paged' ];
		$pages = $query->max_num_pages;
		$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : ( get_query_var( 'page' ) ? get_query_var( 'page' ) : 1 );

		if ( $page == 0 ) {
			$page = 1;
		}

		if ( $paginated == 'none' || $pages <= 1 ) {
			return;
		}

		$class = 'vlt-pagination';
		$class .= ' vlt-pagination--' . $paginated;

		$output = '<nav class="' . sodalicious_sanitize_class( $class ) . '">';

		if ( $pages > 1 ) {

			if ( $paginated == 'paged' ) {

				if ( $page - 1 >= 1 ) {
					$output .= '<a class="prev" href="' . get_pagenum_link( $page - 1 ) . '"><i class="ri-arrow-left-line"></i></a>';
				}

				if ( $page + 1 <= $pages ) {
					$output .= '<a class="next" href="' . get_pagenum_link( $page + 1 ) . '"><i class="ri-arrow-right-line"></i></a>';
				}

			}

			if ( $paginated == 'numeric' ) {

				$numeric_links = paginate_links( array(
					'type' => 'array',
					'foramt' => '',
					'add_args' => '',
					'current' => $paged,
					'total' => $pages,
					'prev_text' => '<i class="ri-arrow-left-line"></i>',
					'next_text' => '<i class="ri-arrow-right-line"></i>',
					'end_size' => 3,
					'mid_size' => 3,
				) );

				$output .= '<ul>';
				if ( is_array( $numeric_links ) ) {
					foreach ( $numeric_links as $numeric_link ) {
						$output .= '<li>' . $numeric_link . '</li>';
					}
				}
				$output .= '</ul>';

			}

		}

		$output .= '</nav>';

		return apply_filters( 'sodalicious/get_page_pagination', $output );

	}
}

/**
 * Get post taxonomy
 */
if ( ! function_exists( 'sodalicious_get_post_taxonomy' ) ) {
	function sodalicious_get_post_taxonomy( $post_id, $taxonomy, $delimiter = ', ', $get = 'name', $link = true ) {

		$tags = wp_get_post_terms( $post_id, $taxonomy );
		$list = '';

		foreach ( $tags as $tag ) {
			if ( $link ) {
				$list .= '<a href="' . get_category_link( $tag->term_id ) . '">' . $tag->$get . '</a>' . $delimiter;
			} else {
				$list .= $tag->$get . $delimiter;
			}
		}

		return substr( $list, 0, strlen( $delimiter ) * ( -1 ) );

	}
}

/**
 * Callback for custom comment
 */
if ( ! function_exists( 'sodalicious_callback_custom_comment' ) ) {
	function sodalicious_callback_custom_comment( $comment, $args, $depth ) {

		$GLOBALS['comment'] = $comment;
		global $post;

		?>

		<li <?php comment_class( 'vlt-comment-item' ); ?>>

			<div class="vlt-comment-item__inner" id="comment-<?php comment_ID(); ?>">

				<?php if ( 0 != $args['avatar_size'] && get_avatar( $comment ) ) : ?>
					<a class="vlt-comment-avatar" href="<?php echo get_comment_author_url(); ?>"><?php echo get_avatar( $comment, $args['avatar_size'], '', '', array( 'extra_attr' => 'loading=lazy' ) ); ?></a>
					<!-- /.vlt-comment-avatar -->
				<?php endif; ?>

				<div class="vlt-comment-content">

					<div class="vlt-comment-header">

						<h5 class="vlt-comment-name"><?php comment_author(); ?></h5>

						<div class="vlt-comment-metas">

							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID, $args ) ); ?>">

								<time datetime="<?php comment_time( 'c' ); ?>">

									<?php echo get_comment_date(); ?>

								</time>

							</a>

						</div>

						<?php
							comment_reply_link( array_merge( $args, array(
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
							) ) );
						?>

					</div>
					<!-- /.vlt-comment-header -->

					<div class="vlt-comment-text vlt-content-markup">

						<?php comment_text(); ?>

						<?php if ( '0' == $comment->comment_approved ): ?>

							<p><?php esc_html_e( 'Your comment is awaiting moderation.', 'sodalicious' ); ?></p>

						<?php endif; ?>

					</div>
					<!-- /.vlt-comment-text -->

				</div>
				<!-- /.vlt-comment-content -->

			</div>
			<!-- /.vlt-comment-item__inner -->

		<!-- </li> is added by WordPress automatically -->
		<?php
	}
}

/**
 * Get comment navigation
 */
if ( ! function_exists( 'sodalicious_get_comment_navigation' ) ) {
	function sodalicious_get_comment_navigation() {

		$output = '';

		if ( get_comment_pages_count() > 1 ) :

			$output .= '<nav class="vlt-comments-navigation has-black-color">';
			if ( get_previous_comments_link() ) {
				$output .= get_previous_comments_link( esc_html__( 'Prev Page', 'sodalicious' ) );
			}
			if ( get_next_comments_link() ) {
				$output .= get_next_comments_link( esc_html__( 'Next Page', 'sodalicious' ) );
			}
			$output .= '</nav>';

		endif;

		return apply_filters( 'sodalicious/get_comment_navigation', $output );

	}
}

/**
 * Get single post/work navigation
 */
if ( ! function_exists( 'sodalicious_get_post_navigation' ) ) {
	function sodalicious_get_post_navigation( $style = 'style-1', $post_type = 'post' ) {

		$navClass = 'vlt-page-navigation';
		$navClass .= ' vlt-page-navigation--' . $style;

		$nextPost = get_adjacent_post( false, '', true );
		$prevPost = get_adjacent_post( false, '', false );

		if ( ! $nextPost && ! $prevPost ) {
			return;
		}

		$allLinkID = false;

		if ( $post_type == 'product' ) {

			$allLinkID = sodalicious_get_theme_mod( 'shop_link' );
			$textLink = [
				esc_html__( 'Prev product', 'sodalicious' ),
				esc_html__( 'Next product', 'sodalicious' ),
			];

		} elseif ( $post_type == 'post' ) {

			$allLinkID = sodalicious_get_theme_mod( 'blog_link' );
			$textLink = [
				esc_html__( 'Prev post', 'sodalicious' ),
				esc_html__( 'Next post', 'sodalicious' ),
			];

		} else {

			$allLinkID = sodalicious_get_theme_mod( 'portfolio_link' );
			$textLink = [
				esc_html__( 'Prev project', 'sodalicious' ),
				esc_html__( 'Next project', 'sodalicious' ),
			];

		}

		$output = '<nav class="' . sodalicious_sanitize_class( $navClass ) . '">';

		switch( $style ) {

			case 'style-1':

				$output .= '<div class="container-fluid">';

					$output .= '<div class="row align-items-center">';

						$output .= '<div class="d-flex col">';
						if ( ! empty( $prevPost ) ) {
							$output .= '<div class="prev"><a href="' . get_permalink( $prevPost->ID ) . '"><i class="ri-arrow-left-line"></i>' . $textLink[0] . '</a></div>';
						}
						$output .= '</div>';

						$output .= '<div class="d-flex justify-content-center col">';
						if ( $allLinkID ) {
							$output .= '<div class="all"><a title="' . esc_attr( get_the_title( $allLinkID ) ) . '" href="' . get_permalink( $allLinkID ) . '"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
						} else {
							$output .= '<div class="all"><a title="' . esc_attr__( 'Back', 'sodalicious' ) . '" href="#" class="btn-go-back"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
						}
						$output .= '</div>';

						$output .= '<div class="d-flex justify-content-end col">';
						if ( ! empty( $nextPost ) ) {
							$output .= '<div class="next"><a href="' . get_permalink( $nextPost->ID ) . '">' . $textLink[1] . '<i class="ri-arrow-right-line"></i></a></div>';
						}
						$output .= '</div>';

					$output .= '</div>';

				$output .= '</div>';

			break;

			case 'style-2':

				$output .= '<div class="container">';

					$output .= '<div class="row no-gutters align-items-stretch">';

						$output .= '<div class="col-5">';

							if ( ! empty( $prevPost ) ) {
								$output .= '<div class="prev"><span class="label">' . $textLink[0] . '</span><h5><a href="' . get_permalink( $prevPost->ID ) . '">' . wp_trim_words( get_the_title( $prevPost->ID ), 4 ) . '</a></h5></div>';
							}

						$output .= '</div>';

						$output .= '<div class="col-2 d-flex align-items-center justify-content-center">';

							if ( $allLinkID ) {

								$output .= '<div class="all">';
								$output .= '<a title="' . esc_attr__( 'Back', 'sodalicious' ) . '" href="' . get_permalink( $allLinkID ) . '"><span class="grid"><span></span><span></span><span></span><span></span></span></a>';
								$output .= '</div>';

							} else {
								$output .= '<div class="all"><a title="' . esc_attr__( 'Back', 'sodalicious' ) . '" href="#" class="btn-go-back"><span class="grid"><span></span><span></span><span></span><span></span></span></a></div>';
							}

						$output .= '</div>';

						$output .= '<div class="col-5">';

							if ( ! empty( $nextPost ) ) {
								$output .= '<div class="next"><span class="label">' . $textLink[1] . '</span><h5><a href="' . get_permalink( $nextPost->ID ) . '">' . wp_trim_words( get_the_title( $nextPost->ID ), 4 ) . '</a></h5></div>';
							}

						$output .= '</div>';

					$output .= '</div>';

				$output .= '</div>';

			break;

		}

		$output .= '</nav>';

		return apply_filters( 'sodalicious/get_post_navigation', $output );

	}
}

/**
 * Render elementor template
 */
if ( ! function_exists( 'sodalicious_render_elementor_template' ) ) {
	function sodalicious_render_elementor_template( $template ) {

		if ( ! $template ) {
			return;
		}

		if ( 'publish' !== get_post_status( $template ) ) {
			return;
		}

		return \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $template, true );

	}
}

/**
 * Reading time
 */
if ( ! function_exists( 'sodalicious_get_reading_time' ) ) {
	function sodalicious_get_reading_time() {
		global $post;
		$wpm = 200;
		$words = str_word_count( strip_tags( $post->post_content ) );
		$minutes = floor( $words / $wpm );
		if ( 1 <= $minutes ) {
			$output = $minutes . esc_html__( ' min read', 'sodalicious' );
		} else {
			$output = esc_html__( '1 min read', 'sodalicious' );
		}
		return apply_filters( 'sodalicious/get_reading_time', $output );
	}
}

/**
 * Post views
 */
if ( ! function_exists( 'sodalicious_set_post_views' ) ) {
	function sodalicious_set_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			$count = 0;
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
		} else {
			$count++;
			update_post_meta( $postID, $count_key, $count );
		}

	}
}
add_action( 'wp_head', 'sodalicious_track_post_views' );

if ( ! function_exists( 'sodalicious_track_post_views' ) ) {
	function sodalicious_track_post_views( $postID ) {

		if ( !is_single() ) {
			return;
		}
		if ( empty( $postID ) ) {
			global $post;
			$postID = $post->ID;
		}
		sodalicious_set_post_views( $postID );

	}
}

if ( ! function_exists( 'sodalicious_get_post_views' ) ) {
	function sodalicious_get_post_views( $postID ) {

		$count_key = 'views';
		$count = get_post_meta( $postID, $count_key, true );
		if ( $count == '' ) {
			delete_post_meta( $postID, $count_key );
			add_post_meta( $postID, $count_key, '0' );
			return '0';
		}
		return $count;

	}
}

/*
 * Get the Vimeo/YouTube Video ID from a URL
 */
if ( ! function_exists( 'sodalicious_parse_video_id' ) ) {
	function sodalicious_parse_video_id( $url ) {

		$vendors = [
			[
				'vendor' => 'youtube',
				'pattern' => '/(https?:\/\/)?(www.)?(youtube\.com|youtu\.be|youtube-nocookie\.com)\/(?:embed\/|v\/|watch\?v=|watch\?list=(.*)&v=|watch\?(.*[^&]&)v=)?((\w|-){11})(&list=(\w+)&?)?/',
				'patternIndex' => 6
			],
			[
				'vendor' => 'vimeo',
				'pattern' => '/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/',
				'patternIndex' => 3
			]
		];

		foreach ( $vendors as $vendor ) {

			$video_id = false;

			if ( preg_match( $vendor[ 'pattern' ], $url, $matches ) ) {
				$video_id = $matches[ $vendor[ 'patternIndex' ] ];
			}

			if ( $video_id ) {
				$video_data = [$vendor[ 'vendor' ], $video_id ];
				return $video_data;
			}

		}

		return [ 'custom', $url ];

	}
}
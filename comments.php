<?php

/**
 * @author: SODAThemes
 * @version: 2.0.7
 */

if ( post_password_required() ) {
	return;
}

?>

<div class="vlt-page-comments vlt-page-comments--style-1" id="comments">

	<?php if ( have_comments() ) : ?>

		<div class="vlt-page-comments__list">

			<div class="container">

				<div class="row">

					<div class="col-lg-8 offset-lg-2">

						<h3 class="vlt-page-comments__title">

							<?php comments_number( esc_html__( 'No comments', 'sodalicious' ) , esc_html__( 'Comment (1):', 'sodalicious' ) , esc_html__( 'Comments (%):', 'sodalicious' ) ); ?>

						</h3>

						<ul class="vlt-comments">

							<?php

								wp_list_comments( array(
									'avatar_size' => 90,
									'style' => 'ul',
									'max_depth' => '3',
									'short_ping' => true,
									'reply_text' => '<i class="ri-reply-fill"></i>' . esc_html__( 'Reply', 'sodalicious' ),
									'callback' => 'sodalicious_callback_custom_comment',
								) );

							?>

						</ul>

						<?php echo sodalicious_get_comment_navigation(); ?>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<?php if ( comments_open() ) : ?>

		<div class="vlt-page-comments__form">

			<div class="container">

				<div class="row">

					<div class="col-lg-8 offset-lg-2">

						<?php

							$commenter = wp_get_current_commenter();

							$args = array(
								'title_reply' => esc_html__( 'Leave a comment:', 'sodalicious' ),
								'title_reply_before' => '<h3 class="vlt-page-comments__title">',
								'title_reply_after' => '</h3>',
								'cancel_reply_before' => '',
								'cancel_reply_after' => '',
								'comment_notes_before' => '',
								'comment_notes_after' => '',
								'title_reply_to' => esc_html__( 'Leave a Reply', 'sodalicious' ),
								'cancel_reply_link' => '<i class="ri-close-fill"></i>',
								'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
								'class_submit' => 'vlt-btn vlt-btn--effect vlt-btn--primary vlt-btn--lg',
								'label_submit' => esc_html__( 'Post a comment', 'sodalicious' ),
								'comment_field' => '<div class="vlt-form-group"><textarea id="comment" name="comment" rows="5" class="vlt-form-control"></textarea><label for="comment" class="vlt-form-label">' . esc_attr__( 'Comment', 'sodalicious' ) . '</label></div>',
								'fields' => array(
									'cookies' => false,
									'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="vlt-form-control"><label for="author" class="vlt-form-label">' . esc_attr__( 'Your name *', 'sodalicious' ) . '</label></div>',
									'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="vlt-form-control"><label for="email" class="vlt-form-label">' . esc_attr__( 'Email address *', 'sodalicious' ) . '</label></div></div>',
								),
							);

							comment_form( $args );

						?>

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

</div>
<!-- /.vlt-page-comments -->
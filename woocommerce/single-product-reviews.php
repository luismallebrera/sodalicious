<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div class="vlt-product-reviews" id="reviews" >

	<?php if ( have_comments() ) : ?>

		<div class="vlt-product-reviews__list">

			<ul class="vlt-reviews">

				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>

			</ul>

			<?php echo sodalicious_get_comment_navigation(); ?>

		</div>

	<?php endif; ?>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div class="vlt-product-reviews__form">

			<?php

				$commenter = wp_get_current_commenter();
				$comment_form = array(
					/* translators: %s is product title */
					'title_reply' => have_comments() ? esc_html__( 'Add a review', 'sodalicious' ) : sprintf( esc_html__( 'Be the first to review &ldquo;%s&rdquo;', 'sodalicious' ), get_the_title() ),
					/* translators: %s is product title */
					'title_reply_to' => esc_html__( 'Leave a Reply to %s', 'sodalicious' ),
					'title_reply_before' => '<h5 class="vlt-product-reviews__title">',
					'title_reply_after' => '</h5>',
					'comment_notes_after' => '',
					'label_submit' => esc_html__( 'Submit', 'sodalicious' ),
					'submit_button' => '<button type="submit" id="%2$s" class="%3$s">%4$s</button>',
					'class_submit' => 'vlt-btn vlt-btn--effect vlt-btn--primary vlt-btn--lg',
					'logged_in_as' => '',
					'comment_field' => '',
					'fields' => array(
						'cookies' => false,
						'author' => '<div class="vlt-form-row two-col"><div class="vlt-form-group"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" class="vlt-form-control"><label for="author" class="vlt-form-label">' . esc_attr__( 'Your name *', 'sodalicious' ) . '</label></div>',
						'email' => '<div class="vlt-form-group"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" class="vlt-form-control"><label for="email" class="vlt-form-label">' . esc_attr__( 'Email address *', 'sodalicious' ) . '</label></div></div>',
					),
				);

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					/* translators: %s opening and closing link tags respectively */
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( esc_html__( 'You must be %1$slogged in%2$s to post a review.', 'sodalicious' ), '<a href="' . esc_url( $account_page_url ) . '">', '</a>' ) . '</p>';
				}

				$comment_form['comment_field'] = '<div class="vlt-form-group"><textarea id="comment" name="comment" cols="45" rows="3" required class="vlt-form-control"></textarea><label fore="comment" class="vlt-form-label">' . esc_attr__( 'Your review *', 'sodalicious' ) . '</label></div>';

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] .= '<div class="vlt-form-group"><div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'sodalicious' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'sodalicious' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'sodalicious' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'sodalicious' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'sodalicious' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'sodalicious' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'sodalicious' ) . '</option>
					</select></div></div>';
				}

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );

			?>

		</div>

	<?php endif; ?>

</div>

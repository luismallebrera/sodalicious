<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="row" id="customer_login">

	<div class="col-md-6">

<?php endif; ?>

	<div class="vlt-woocommerce-form-login-wrapper">

		<h3><?php esc_html_e( 'Login', 'sodalicious' ); ?></h3>

		<form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="vlt-form-group">
				<input type="text" class="vlt-form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				<label for="username" class="vlt-form-label"><?php esc_html_e( 'Username or email address*', 'sodalicious' ); ?></label>
			</div>

			<div class="vlt-form-group">
				<input class="vlt-form-control woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
				<label for="password" class="vlt-form-label"><?php esc_html_e( 'Password*', 'sodalicious' ); ?></label>
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="vlt-form-group">

				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'sodalicious' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

			</div>

			<button type="submit" class="vlt-btn vlt-btn--primary vlt-btn--effect woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'sodalicious' ); ?>"><?php esc_html_e( 'Log in', 'sodalicious' ); ?></button>

			<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="vlt-underline-link"><?php esc_html_e( 'Lost your password?', 'sodalicious' ); ?></a>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

	</div>
	<!-- /.vlt-woocommerce-form-login-wrapper -->

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	</div>

	<div class="col-md-6">

		<div class="vlt-woocommerce-form-register-wrapper">

			<h3><?php esc_html_e( 'Register', 'sodalicious' ); ?></h3>

			<form method="post" class="woocommerce-form woocommerce-form-register register">

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<div class="vlt-form-group">
						<input type="text" class="vlt-form-control woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						<label for="reg_username" class="vlt-form-label"><?php esc_html_e( 'Username*', 'sodalicious' ); ?></label>
					</div>

				<?php endif; ?>

				<div class="vlt-form-group">
					<input type="email" class="vlt-form-control woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
					<label for="reg_email" class="vlt-form-label"><?php esc_html_e( 'Email address*', 'sodalicious' ); ?></label>
				</div>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<div class="vlt-form-group">
						<input type="password" class="vlt-form-control woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
						<label for="reg_password" class="vlt-form-label"><?php esc_html_e( 'Password', 'sodalicious' ); ?>&nbsp;<span class="required">*</span></label>
					</div>

				<?php endif; ?>

				<div class="vlt-form-group">

					<?php do_action( 'woocommerce_register_form' ); ?>

				</div>

				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="vlt-btn vlt-btn--primary vlt-btn--effect woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'sodalicious' ); ?>"><?php esc_html_e( 'Register', 'sodalicious' ); ?></button>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>

		</div>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

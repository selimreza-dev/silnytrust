<?php

/**
 * Login & Register Form (Separated by page)
 *
 * @package WooCommerce\Templates
 * @version 9.9.0
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Page detection
 */
$is_login_page    = is_page('login');
$is_register_page = is_page('register');

do_action('woocommerce_before_customer_login_form');
?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
	<div class="u-columns col2-set" id="customer_login">
	<?php endif; ?>

	<?php
	/**
	 * =========================
	 * LOGIN FORM
	 * =========================
	 * Show on:
	 * - /login
	 * - /my-account
	 */
	if ($is_login_page || (! $is_login_page && ! $is_register_page)) :
	?>
		<div class="u-column1 col-1">

			<h2><?php esc_html_e('Login Form', 'woocommerce'); ?></h2>

			<form class="woocommerce-form woocommerce-form-login login" method="post" novalidate>

				<?php do_action('woocommerce_login_form_start'); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="woocommerce-Input input-text" name="username" id="username" autocomplete="username" required />
				</p>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input class="woocommerce-Input input-text" type="password" name="password" id="password" autocomplete="current-password" required />
				</p>

				<?php do_action('woocommerce_login_form'); ?>

				<p class="form-row">
					<label class="woocommerce-form__label woocommerce-form__label-for-checkbox">
						<input class="woocommerce-form__input-checkbox" name="rememberme" type="checkbox" value="forever" />
						<span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
					</label>

					<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>

					<button type="submit" class="woocommerce-button button" name="login" value="login">
						<?php esc_html_e('Log in', 'woocommerce'); ?>
					</button>
				</p>

				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url(wp_lostpassword_url()); ?>">
						<?php esc_html_e('Lost your password?', 'woocommerce'); ?>
					</a>
				</p>

				<p class="woocommerce-register-link">
					<?php esc_html_e("Don't have an account?", 'woocommerce'); ?>
					<a href="<?php echo esc_url(site_url('/register/')); ?>">
						<?php esc_html_e('Register here', 'woocommerce'); ?>
					</a>
				</p>


				<?php do_action('woocommerce_login_form_end'); ?>

			</form>
		</div>
	<?php endif; ?>


	<?php
	/**
	 * =========================
	 * REGISTER FORM
	 * =========================
	 * Show on:
	 * - /register
	 * - /my-account
	 */
	if (
		'yes' === get_option('woocommerce_enable_myaccount_registration') &&
		($is_register_page || (! $is_login_page && ! $is_register_page))
	) :
	?>
		<div class="u-column2 col-2">

			<h2><?php esc_html_e('Register Form', 'woocommerce'); ?></h2>

			<form method="post" class="woocommerce-form woocommerce-form-register register">

				<?php do_action('woocommerce_register_form_start'); ?>

				<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>
					<p class="woocommerce-form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="text" class="woocommerce-Input input-text" name="username" id="reg_username" required />
					</p>
				<?php endif; ?>

				<p class="woocommerce-form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
					<input type="email" class="woocommerce-Input input-text" name="email" id="reg_email" required />
				</p>

				<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>
					<p class="woocommerce-form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
						<input type="password" class="woocommerce-Input input-text" name="password" id="reg_password" required />
					</p>
				<?php else : ?>
					<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>
				<?php endif; ?>

				<?php do_action('woocommerce_register_form'); ?>

				<p class="form-row">
					<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
					<button type="submit" class="woocommerce-button button" name="register" value="register">
						<?php esc_html_e('Register', 'woocommerce'); ?>
					</button>
				</p>

				<p class="woocommerce-login-link">
					<?php esc_html_e('Already have an account?', 'woocommerce'); ?>
					<a href="<?php echo esc_url(site_url('/login/')); ?>">
						<?php esc_html_e('Login here', 'woocommerce'); ?>
					</a>
				</p>


				<?php do_action('woocommerce_register_form_end'); ?>

			</form>
		</div>
	<?php endif; ?>

	<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>
	</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>
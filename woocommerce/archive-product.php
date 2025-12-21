<?php
defined('ABSPATH') || exit;

get_header('shop');
?>

<main class="shop-page">

	<?php
	/**
	 * Before main content
	 * Breadcrumb, opening wrappers
	 */
	do_action('woocommerce_before_main_content');
	?>

	<header class="shop-header">
		<?php
		/**
		 * Shop title & taxonomy title
		 */
		do_action('woocommerce_shop_loop_header');
		?>
	</header>

	<div class="shop-layout">

		<div class="woocommerce-sidebar">
			<?php if (is_active_sidebar('shop-sidebar')): ?>
				<?php
				/**
				 * Sidebar
				 */
				do_action('woocommerce_sidebar');
				?>
			<?php endif; ?>
		</div>

		<section class="shop-products">
			<div class="shop-toolbar">
				<?php do_action('woocommerce_before_shop_loop'); ?>
			</div>

			<?php
			if (woocommerce_product_loop()) {

				woocommerce_product_loop_start();

				while (have_posts()) {
					the_post();
					wc_get_template_part('content', 'product');
				}

				woocommerce_product_loop_end();
			} else {
				do_action('woocommerce_no_products_found');
			}
			?>

			<?php
			/**
			 * Pagination, result count
			 */
			do_action('woocommerce_after_shop_loop');
			?>

		</section>

	</div>

	<?php
	/**
	 * After main content
	 */
	do_action('woocommerce_after_main_content');
	?>

</main>

<?php
get_footer('shop');

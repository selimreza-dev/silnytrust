<?php

/**
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>


<section id="woocommerce_before_main_content" class=" w-full">
	<?php do_action('woocommerce_before_main_content'); ?>


	<div class="woocommerce_shop_loop_header">
		<?php do_action('woocommerce_shop_loop_header'); ?>
	</div>


	<div class="shop-page-product-sidebar-wrapper flex items-start justify-between gap-10 pt-7 pb-10 flex-col md:flex-row max-w-full px-5 md:max-w-7xl mx-auto">
		<div class="shop-sidebar w-full md:w-3/12 ">
			<?php
			do_action('woocommerce_sidebar'); ?>
		</div>
		<div class="shop-products-loop w-full md:w-9/12">
			<?php
			if (woocommerce_product_loop()) {

				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				}

				woocommerce_product_loop_end();
				do_action('woocommerce_after_shop_loop');
			} else {
				do_action('woocommerce_no_products_found');
			}
			?>
		</div>
	</div>

	<?php
	do_action('woocommerce_after_main_content');
	?>

</section>

<?php get_footer('shop'); ?>
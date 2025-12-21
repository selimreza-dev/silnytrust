<?php
defined('ABSPATH') || exit;

global $product;
?>

<li <?php wc_product_class('product-card', $product); ?>>

	<div class="product-inner">

		<?php do_action('woocommerce_before_shop_loop_item'); ?>

		<div class="product-thumb">
			<?php do_action('woocommerce_before_shop_loop_item_title'); ?>
		</div>

		<div class="product-title">
			<?php do_action('woocommerce_shop_loop_item_title'); ?>
		</div>

		<div class="product-meta">
			<?php do_action('woocommerce_after_shop_loop_item_title'); ?>
		</div>

		<?php do_action('woocommerce_after_shop_loop_item'); ?>

	</div>

</li>
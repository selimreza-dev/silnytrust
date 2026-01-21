<?php

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<div class="mini-cart-box">
	<div class="mini-cart-title">
		<h4>Your Cart</h4>
		<div class="mini-cart-close">
			<i id="cart-close-btn" class="fa-solid fa-circle-xmark"></i>
		</div>
	</div>
	<div class="cart-content">
		<?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : $_product = $cart_item['data'];
			$product_id = $cart_item['product_id']; ?>

			<div class="mini-cart-items flex justify-between gap-2 items-start border-b pb-3 mb-5 border-gray-300">

				<div class="mini-cart-image w-3/12">
					<?php echo $_product->get_image(); ?>
				</div>
				<div class="mini-cart-details w-9/12">
					<h3>
						<?php echo $_product->get_name(); ?>
					</h3>
					<div class="product-variation">
						<?php echo wc_get_formatted_cart_item_data($cart_item); ?>
					</div>

					<div>
						<span class="qty">Qty: <?php echo $cart_item['quantity']; ?></span>
					</div>

					<div class="flex justify-between items-center mini-cart-remove-btn-and-amount">
						<div class="mini-cart-remove-option">
							<?php echo apply_filters('woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove-item" aria-label="%s"><i class="fa-regular fa-trash-can"></i></a>', esc_url(wc_get_cart_remove_url($cart_item_key)), esc_attr__('Remove this item', 'woocommerce')), $cart_item_key); ?>
						</div>
						<h4><?php echo WC()->cart->get_product_price($_product); ?></h4>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="subtotal">
		<p>Subtotal: <?php echo WC()->cart->get_cart_subtotal(); ?></p>
	</div>
	<div class="view-cart">
		<a href="<?php echo wc_get_cart_url(); ?>">View Cart</a>
	</div>
	<div class="go-to-checkout">
		<a href="<?php echo wc_get_checkout_url(); ?>">Go to Checkout</a>
	</div>

</div>

<?php do_action('woocommerce_after_mini_cart'); ?>
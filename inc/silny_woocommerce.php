<?php

// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// remove add to cart button
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// remove add to cart button
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// short description after title
add_action('woocommerce_after_shop_loop_item_title', 'silnytrust_show_short_description', 12);
function silnytrust_show_short_description()
{
    global $product;
    $excerpt = $product->get_short_description();
    if ($excerpt) {
        echo '<div class="shop-short-desc">' . wp_trim_words($excerpt, 10) . '</div>';
    }
}

// change to add to cart text to buy now
add_filter('woocommerce_product_add_to_cart_text', 'silnytrust_custom_cart_text');

function silnytrust_custom_cart_text()
{
    return __('Buy Now', 'silnytrust');
}

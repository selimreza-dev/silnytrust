<?php

add_filter('woocommerce_add_to_cart_fragments', 'silnytrust_update_mini_cart_fragments');

function silnytrust_update_mini_cart_fragments($fragments)
{

    // Cart count
    ob_start();
?>
    <span class="cart-count mini-cart-count absolute -top-2 right-1 primary-color-bg
                 w-4.5 h-4.5 flex items-center justify-center rounded-full
                 text-[13px] font-semibold text-white">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['.mini-cart-count'] = ob_get_clean();

    // Cart total
    ob_start();
    ?>
    <span class="mini-cart-total">
        <?php echo WC()->cart->get_cart_total(); ?>
    </span>
<?php
    $fragments['.mini-cart-total'] = ob_get_clean();

    return $fragments;
}

// cart box ajax

add_filter('woocommerce_add_to_cart_fragments', 'silnytrust_update_mini_cart');
function silnytrust_update_mini_cart($fragments)
{
    ob_start();
?>
    <div class="mini-cart">
        <?php woocommerce_mini_cart(); ?>
    </div>
<?php
    $fragments['div.mini-cart'] = ob_get_clean();
    return $fragments;
}

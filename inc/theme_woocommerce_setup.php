<?php
// woocommerce all functions are here

// remove default breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);


// remove default shop page title
remove_action('woocommerce_shop_loop_header', 'woocommerce_product_taxonomy_archive_header', 10);

// add custom shop page header and breadcrumb
add_action('woocommerce_shop_loop_header', 'silnytrust_shop_header', 10);

function silnytrust_shop_header()
{
?>
    <?php
    $page_header_img = get_template_directory_uri() . '/assets/img/page-bg-img.png';
    ?>
    <div class="shop-page-header-breadcrumb w-full h-40 page-title text-center  flex items-center justify-center" style="background-image: url('<?php echo $page_header_img; ?>'); background-position:center; background-size:cover; background-repeat:no-repeat;">
        <div class="title-breadcrumb-wrap flex flex-col gap-3 items-center justify-center">
            <div class="shop-page-title text-2xl md:text-3xl uppercase font-medium primary-font light-color-text">
                <?php woocommerce_page_title(); ?>
            </div>
            <div class="shop-page-breadcrumb">
                <p class=" flex items-center justify-center gap-2">
                    <span>
                        <a class="home-page-navigate light-color-text hover:primary-text-color" href="<?php echo home_url(); ?>"><span>HOME</span></a>
                    </span>
                    <span class="light-color-text">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                        </svg>

                    </span>
                    <span class="uppercase light-color-text archive-title primary-font">
                        <?php woocommerce_page_title(); ?>
                    </span>
                    </span>
                </p>
            </div>
        </div>
    </div>
<?php
}

// custom sale flash / badge
// remove default sale flash
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

// custom sale flash
add_action('woocommerce_before_shop_loop_item_title', 'silnytrust_shop_custom_sale_flash', 10);

function silnytrust_shop_custom_sale_flash()
{
    global $product;

    if (!$product || !$product->is_on_sale()) {
        return;
    }

    // Simple product
    if ($product->is_type('simple')) {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();

        if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $percent = round((($regular_price - $sale_price) / $regular_price) * 100);
            echo '<span class="shop-custom-sale-badge">' . $percent . '  % OFF</span>';
            return;
        }
    }


    // Variable product
    if ($product->is_type('variable')) {

        $regular_price = (float) $product->get_variation_regular_price('max', true);
        $sale_price = (float) $product->get_variation_sale_price('min', true);

        if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $percent = round((($regular_price - $sale_price) / $regular_price) * 100);
            echo '<span class="shop-custom-sale-badge">' . $percent . '  % OFF</span>';
            return;
        }
    }




    echo '<span class="shop-custom-sale-badge">Sale</span>';
}



// star rating
// remove default rating
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

// custom rating
add_action(
    'woocommerce_after_shop_loop_item_title',
    'silnytrust_shop_product_rating',
    5
);

function silnytrust_shop_product_rating()
{
    global $product;

    if (! $product) {
        return;
    }

    $rating_count = (int) $product->get_rating_count();
    $average      = (float) $product->get_average_rating();

    echo '<div class="shop-rating">';

    /**
     * Case 1: Reviews enabled + rating exists
     * → Use WooCommerce native HTML
     */
    if (wc_review_ratings_enabled() && $rating_count > 0) {

        echo wc_get_rating_html($average, $rating_count);
        echo '<span class="review-count">(' . esc_html($rating_count) . ')</span>';

        echo '</div>';
        return;
    }

    /**
     * Case 2: No reviews (or reviews disabled)
     * → Show empty stars (manual, reliable)
     */
    echo '<div class="star-rating empty-stars" aria-label="No reviews">';
    echo '<span style="width:0%"></span>';
    echo '</div>';
    echo '<span class="review-count">(0)</span>';

    echo '</div>';
}


// remove default price and add custom price
// custom price
remove_action(
    'woocommerce_after_shop_loop_item_title',
    'woocommerce_template_loop_price',
    10
);

add_action(
    'woocommerce_after_shop_loop_item_title',
    'silnytrust_shop_product_price',
    20
);

function silnytrust_shop_product_price()
{
    global $product;
    if (!$product) {
        return;
    }
    echo '<div class="shop-price">';

    // Simple product
    if ($product->is_type('simple')) {
        if ($product->is_on_sale()) {
            echo '<span class="price-regular">';
            echo wc_price($product->get_regular_price());
            echo '</span>';

            echo '<span class="price-sale">';
            echo wc_price($product->get_sale_price());
            echo '</span>';
        } else {
            echo '<span class="price-normal">';
            echo wc_price($product->get_price());
            echo '</span>';
        }
    }

    // Variable product
    if ($product->is_type('variable')) {
        $min_price = $product->get_variation_price('min', true);
        $max_price = $product->get_variation_price('max', true);

        $min_regular = $product->get_variation_regular_price('min', true);
        $max_regular = $product->get_variation_regular_price('max', true);

        // on sale
        if ($product->is_on_sale()) {
            echo '<span class="price-from"> From </span>';
            echo '<span class="price-sale">';
            echo wc_price($min_price);
            echo '</span>';
        } else {
            if ($min_price !== $max_price) {
                echo '<span class="price-from">From </span>';
                echo '<span class="price-normal">';
                echo wc_price($min_price);
                echo '</span>';
            } else {
                echo '</span class="price-normal">';
                echo wc_price($min_price);
                echo '</span>';
            }
        }
    }
    echo '</div>';
}



// add to cart button
// default add to cart buttom remove and custom button add

remove_action(
    'woocommerce_after_shop_loop_item',
    'woocommerce_template_loop_add_to_cart',
    10
);


add_action(
    'woocommerce_after_shop_loop_item',
    'silnytrust_shop_add_to_cart',
    30
);
function silnytrust_shop_add_to_cart()
{
    global $product;
    if (!$product) {
        return;
    }

    echo '<div class="shop-add-to-cart">';
    woocommerce_template_loop_add_to_cart();
    echo '</div>';
}

add_filter('woocommerce_product_add_to_cart_text', 'silnytrust_add_to_cart_text', 10, 2);
function silnytrust_add_to_cart_text($text, $product)
{
    if ($product->is_type('simple')) {
        return __('Add to Cart', 'silnytrust');
    }
    if ($product->is_type('variable')) {
        return __('View Options', 'silnytrust');
    }
    if ($product->is_type('external')) {
        return __('Buy Now', 'silnytrust');
    }
    return $text;
}



// woocommerce pagination
// remove default woocommerce pagination
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);


// add custom pagination
add_action('woocommerce_after_shop_loop', 'silnytrust_custom_woocommerce_pagination', 10);
function silnytrust_custom_woocommerce_pagination()
{
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return;

    $big = 999999999;

    echo '<nav class="silnytrust-woo-pagination">';
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => '⮜',
        'next_text' => '⮞',
        'type'      => 'list',
    ));
    echo '</nav>';
}


// Single product page
// remove single product gallery
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

// add custom gallery
add_action('woocommerce_before_single_product_summary', 'silnytrust_custom_single_gallery', 20);
function silnytrust_custom_single_gallery()
{
    global $product;
    if (! $product) return;

    $main_image_id = $product->get_image_id();
    $gallery_ids = $product->get_gallery_image_ids();

?>
    <div class="single-product-custom-gallery">
        <div class="gallery-main">
            <?php echo wp_get_attachment_image($main_image_id, 'large'); ?>
        </div>
        <div class="gallery-all-images">

            <?php if ($gallery_ids) : ?>
                <div class="gallery-thumbs">
                    <div class="gallery-prev gallery-change-btn">
                        <i class="fa-solid fa-angles-left"></i>
                    </div>
                    <div class="gallery-next gallery-change-btn">
                        <i class="fa-solid fa-angles-right"></i>
                    </div>
                    <?php foreach ($gallery_ids as $id): ?>
                        <div class="gallery-item ">
                            <img class="gallery-image" src="<?php echo wp_get_attachment_image_url($id, 'thumbnail');  ?>"
                                data-full="<?php echo wp_get_attachment_image_url($id, 'large'); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php
}


//  Single product sale badge / flash

// custom sale flash / badge
// remove default sale flash
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// custom sale flash
add_action('woocommerce_before_single_product_summary', 'silnytrust_single_custom_sale_badge', 10);

function silnytrust_single_custom_sale_badge()
{
    global $product;

    if (!$product || !$product->is_on_sale()) {
        return;
    }

    // Simple product
    if ($product->is_type('simple')) {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();

        if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $percent = round((($regular_price - $sale_price) / $regular_price) * 100);
            echo '<span class="single-product-custom-sale-badge">' . $percent . '  % OFF</span>';
            return;
        }
    }


    // Variable product
    if ($product->is_type('variable')) {

        $regular_price = (float) $product->get_variation_regular_price('max', true);
        $sale_price = (float) $product->get_variation_sale_price('min', true);

        if ($regular_price > 0 && $sale_price > 0 && $regular_price > $sale_price) {
            $percent = round((($regular_price - $sale_price) / $regular_price) * 100);
            echo '<span class="single-product-custom-sale-badge">' . $percent . '  % OFF</span>';
            return;
        }
    }




    echo '<span class="single-product-custom-sale-badge">Sale</span>';
}



// remove product rating single product page and add
// remove reting
remove_action(
    'woocommerce_single_product_summary',
    'woocommerce_template_single_rating',
    10
);

// remove single product page short description
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

// add single product page short description
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 7);

// remove single product page price
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 15);
// add product
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

// add star rating
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 15);

// remove_add to cart
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);


// remove sku and category
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


// add sku and category
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 30);

// add  -  add to cart
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);


// Quantity button plus minus button
add_action('woocommerce_before_add_to_cart_quantity', 'custom_quantity_minus_button');
function custom_quantity_minus_button()
{
    echo '<div class="single-product-page-qtn">';
    echo '<button type="button" class="minus-btn">-</button>';
}

add_action('woocommerce_after_add_to_cart_quantity', 'custom_quantity_plus_button');
function custom_quantity_plus_button()
{
    echo '<button type="button" class="plus-btn">+</button>';
    echo '</div>';
}


// cart page

// custom quantity
add_filter('woocommerce_cart_item_quantity', function ($html, $cart_item_key, $cart_item) {

    if ($cart_item['data']->is_sold_individually()) {
        return $html;
    }

    return '
    <div class="qty-wrap">
        <button type="button" class="qty-btn minus">−</button>
        ' . $html . '
        <button type="button" class="qty-btn plus">+</button>
    </div>';
}, 10, 3);

add_filter('woocommerce_cart_item_remove_link', function ($link, $cart_item_key) {
    return str_replace(
        'aria-label="',
        'aria-label="Remove product" title="Remove product" ',
        $link
    );
}, 10, 2);


// checkout page

// checkout page
add_filter('woocommerce_checkout_fields', 'custom_remove_checkout_fields');

function custom_remove_checkout_fields($fields)
{

    // remove some field billing area
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']); // যদি শুধু একটি দেশেই ব্যবসা করেন
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_email']);
    unset($fields['billing']['billing_address_2']);

    // remove some field in shipping area
    unset($fields['shipping']['shipping_company']);
    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);
    unset($fields['shipping']['shipping_city']);
    unset($fields['shipping']['shipping_postcode']);
    unset($fields['shipping']['shipping_first_name']);
    unset($fields['shipping']['shipping_last_name']);
    unset($fields['shipping']['shipping_phone']);
    unset($fields['shipping']['shipping_address_1']);
    unset($fields['shipping']['shipping_address_2']);

    // requared this field
    $fields['billing']['billing_first_name']['required'] = true;
    $fields['billing']['billing_phone']['required']      = true;
    $fields['billing']['billing_address_1']['required']  = true;



    // customer notes field optional
    $fields['order']['order_comments']['required'] = false;

    // label set
    $fields['billing']['billing_first_name']['label'] = 'Your Name';
    $fields['billing']['billing_first_name']['placeholder'] = 'John Due';
    $fields['billing']['billing_address_1']['label'] = 'Your Full Address';
    $fields['billing']['billing_address_1']['placeholder'] = 'Village, Thana, District';
    $fields['billing']['billing_phone']['label'] = 'Your Phone';
    $fields['billing']['billing_phone']['placeholder'] = '01700000000';

    return $fields;
}

// default coupon remove
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
// custom coupon section added
add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_coupon_form');



// myaccount if not login to redirect login page
add_action('template_redirect', function () {

    // My Account page ID
    $myaccount_id = wc_get_page_id('myaccount');

    if (is_page($myaccount_id) && ! is_user_logged_in()) {

        // Login page URL
        $login_url = site_url('/login/');

        wp_safe_redirect($login_url);
        exit;
    }
});

// if login successfully to redirect my account page
add_filter('woocommerce_login_redirect', 'custom_login_redirect', 10, 2);

function custom_login_redirect($redirect, $user)
{

    // My Account page URL
    $myaccount_url = wc_get_page_permalink('myaccount');

    return $myaccount_url;
}

// if register successfully to redirect my account page
add_filter('woocommerce_registration_redirect', 'custom_register_redirect');

function custom_register_redirect($redirect)
{

    return wc_get_page_permalink('myaccount');
}



// my account dashboard tab rename
add_filter('woocommerce_account_menu_items', 'custom_myaccount_menu_labels');

function custom_myaccount_menu_labels($items)
{

    $items['dashboard']       = '⌗ Dashboard';
    $items['orders']          = '🗎 My Orders';
    $items['downloads']       = '🗁 Downloads';
    $items['edit-address']    = '⟟ Address';
    $items['edit-account']    = '⛯ Profile Settings';
    $items['customer-logout'] = '⤸ Logout';

    return $items;
}

<?php

// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// remove add to cart button
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// remove add to cart button
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// // short description after title
// add_action('woocommerce_after_shop_loop_item_title', 'silnytrust_show_short_description', 12);
// function silnytrust_show_short_description()
// {
//     global $product;
//     $excerpt = $product->get_short_description();
//     if ($excerpt) {
//         echo '<div class="shop-short-desc">' . wp_trim_words($excerpt, 10) . '</div>';
//     }
// }

// // change to add to cart text to buy now
// add_filter('woocommerce_product_add_to_cart_text', 'silnytrust_custom_cart_text');

// function silnytrust_custom_cart_text()
// {
//     return __('Buy Now', 'silnytrust');
// }


// remove woocommerce default wrapper stracture
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// silnytrust theme wrapper design function
add_action('woocommerce_before_main_content', 'silnytrust_tailwind_layout_start', 10);
function silnytrust_tailwind_layout_start()
{
    echo '<main>';
    echo '<section class="py-10">';
    echo '<div class="w-12/12 sm:w-11/12 mx-auto px-5">';
}

add_action('woocommerce_after_main_content', 'silnytrust_tailwind_layout_end', 10);
function silnytrust_tailwind_layout_end()
{

    echo '</div>';
    echo '</section>';
    echo '</main>';
}

// // remove reting
// remove_action(
//     'woocommerce_single_product_summary',
//     'woocommerce_template_single_rating',
//     10
// );

// // remove price and upate price position
// remove_action(
//     'woocommerce_single_product_summary',
//     'woocommerce_template_single_price',
//     10
// );
// add_action(
//     'woocommerce_single_product_summary',
//     'woocommerce_template_single_price',
//     9
// );

// add custom text
// add_action('woocommerce_single_product_summary', 'silnytrust_free_delivery_text', 35);
// function silnytrust_free_delivery_text()
// {
//     echo '<p class="single_free_delivery_text">Free Delivery Available</p>';
// }


// // price in the top
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 4);

// sharing remove
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// add_action('woocommerce_single_product_summary', 'sinlytrust_single_free_delivery_text', 60);
// function sinlytrust_single_free_delivery_text()
// {
//     echo '<p class="free-delivery-text">Free Delivery Available</p>';
// }

// // add_to_cart undertitle
// remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

// add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 7);

// // add custom text (Delivery Charge Free);
// add_action('woocommerce_single_product_summary', 'silnytrust_single_free_delivery', 60);
// function silnytrust_single_free_delivery()
// {
//     echo '<h3 class="free-delivery-charge">Delivery Free</h3>';
// }


//variable product notice
add_action('woocommerce_single_product_summary', 'variable_product_notice', 25);
function variable_product_notice()
{
    global $product;
    if ($product->is_type('variable')) {
        echo '<p clsas="variable-product">Please Select options before buying.</p>';
    }
}

// // out of stock
// add_action(
//     'woocommerce_single_product_summary',
//     'stock_notice',
//     15
// );
// add_action(
//     'woocommerce_single_product_summary',
//     'stock_notice',
//     15
// );

// function stock_notice()
// {
//     global $product;

//     if (! $product->is_in_stock()) {
//         echo '<p class="out-stock">Out of stock This Product</p>';
//     }
// }

// add_action(
//     'woocommerce_single_product_summary',
//     'mobile_cta',
//     35
// );

// function mobile_cta()
// {
//     echo '<div class="mobile-only">Tap to order</div>';
// }


// // sale badge remove
// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// // custom sale badge
// add_action('woocommerce_before_single_product_summary', 'custom_sale_badge', 10);
// function custom_sale_badge()
// {
//     echo '<span class="custom-sale-badge">SALE</span>';
// }

// //remove single product sale badge
// remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);


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



// // Single product page tabs
// add_filter('woocommerce_product_tabs', function ($tabs) {
//     unset($tabs['reviews']);
//     return $tabs;
// });

// // description and additional info
// add_filter('woocommerce_product_tabs', function ($tabs) {
//     $tabs['description']['priority'] = 10;
//     $tabs['additional_information']['priority'] = 5;
//     return $tabs;
// });

// // add new tabs
// add_filter('woocommerce_product_tabs', function ($tabs) {
//     $tabs['3d_view'] = [
//         'title' => '3D View',
//         'prioritiy' => 15,
//         'callback' => 'silnytrust_3d_view_content'
//     ];
//     return $tabs;
// });
// function silnytrust_3d_view_content()
// {
//     echo "3D View Custom Text";
// }


// Reviews tab rename

// add_filter('woocommerce_product_tabs', function ($tabs) {
//     if (isset($tabs['reviews'])) {
//         $tabs['reviews']['title'] = 'Customer Feedback';
//     }
//     return $tabs;
// });


// // review na thakle tab dekhabo na
// add_filter('woocommerce_product_tabs', function ($tabs) {

//     global $product;

//     if (isset($tabs['reviews']) && $product->get_review_count() === 0) {
//         unset($tabs['reviews']);
//     }

//     return $tabs;
// });

// review form text customize
// add_filter('woocommerce_product_review_comment_form_args', function($args){
//     $args['title_reply'] = 'Write your honest review';
//     $args['comment_notes_after'] ='<p>Your Email will not be published</p>';
//     return $args;
// });

// add_filter('comment_form_defaults', function ($defaults) {

//     if (is_product()) {
//         $defaults['comment_field'] = '<p class="comment-form-comment">
//       <textarea placeholder="Share your experience..." name="comment" required></textarea>
//     </p>';
//     }

//     return $defaults;
// });

// only login use can post review
// add_filter('woocommerce_product_review_comment_form_args', 'disable_review_form_for_guests');

// function disable_review_form_for_guests($args)
// {

//     if (! is_user_logged_in()) {

//         $args['comment_field']        = '';
//         $args['fields']               = [];
//         $args['submit_button']        = '';
//         $args['title_reply']          = '';
//         $args['comment_notes_before'] = '';
//         $args['comment_notes_after']  = '';
//     }

//     return $args;
// }



// add_action('woocommerce_review_before_comment_form', 'guest_review_login_notice');

// function guest_review_login_notice()
// {

//     if (! is_user_logged_in()) {
//         echo '<p class="review-login-notice">
//       Review লিখতে হলে আগে <a href="' . wp_login_url(get_permalink()) . '">login</a> করুন।
//     </p>';
//     }
// }


//Related products remove করা
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

// related products adds
// add_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 5);


// // kotogulo product dekhabe
// add_filter('woocommerce_output_related_products_args', function ($args) {
//     $args['posts_per_page'] = 4;
//     $args['columns'] = 4;
//     return $args;
// });

// // only tag related product
// add_filter('woocommerce_related_products', function ($related_ids, $product_id) {

//     $product = wc_get_product($product_id);
//     $tags    = wp_get_post_terms($product_id, 'product_tag', ['fields' => 'ids']);

//     if (empty($tags)) {
//         return [];
//     }

//     $args = [
//         'post_type'      => 'product',
//         'posts_per_page' => 4,
//         'post__not_in'   => [$product_id],
//         'tax_query'      => [
//             [
//                 'taxonomy' => 'product_tag',
//                 'field'    => 'term_id',
//                 'terms'    => $tags,
//             ]
//         ]
//     ];

//     $query = new WP_Query($args);

//     return wp_list_pluck($query->posts, 'ID');
// }, 10, 2);


// // notice
// add_action('woocommerce_before_shop_loop', function () {
//     wc_add_notice('Test notice from shop page', 'success');
// });

// add sidebar class in the body tag
add_filter('body_class', function ($classes) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        if (is_active_sidebar('shop-sidebar')) {
            $classes[] = 'has-shop-sidebar';
        } else {
            $classes[] = 'no-shop-sidebar';
        }
    }
    return $classes;
});

// if have no sidebar then control product grid 
add_filter('loop_shop_columns', function ($columns) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        if (is_active_sidebar('shop-sidebar')) {
            return 3;
        } else {
            return 4;
        }
    }
}, 20);


// shop page sale badge remove
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);

add_action('woocommerce_before_shop_loop_item_title', 'silnytrust_shop_sale_badge', 9);
function silnytrust_shop_sale_badge()
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

// default rating remove
remove_action(
    'woocommerce_after_shop_loop_item_title',
    'woocommerce_template_loop_rating',
    5
);


// custom rating
add_action(
    'woocommerce_after_shop_loop_item_title',
    'silnytrust_shop_product_rating',
    15
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



// shop page add to cart custom button
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



// remove default sort 
remove_action(
    'woocommerce_before_shop_loop',
    'woocommerce_catalog_ordering',
    30
);
// add custom sort
add_action(
    'woocommerce_before_shop_loop',
    'woocommerce_catalog_ordering',
    20
);
add_filter('woocommerce_catalog_orderby', 'silnytrust_custom_sorting_options');
function silnytrust_custom_sorting_options($options)
{

    return array(
        'menu_order' => __('Default', 'silnytrust'),
        'popularity' => __('Popularity', 'silnytrust'),
        'rating'     => __('Average rating', 'silnytrust'),
        'date'       => __('Latest', 'silnytrust'),
        'price'      => __('Price: low to high', 'silnytrust'),
        'price-desc' => __('Price: high to low', 'silnytrust'),
    );
}

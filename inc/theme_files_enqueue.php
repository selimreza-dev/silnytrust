<?php

// all theme file enqueue

// css enqueue
function silnytrust_css_file_enqueue()
{
    // main css file enqueue
    wp_enqueue_style('silnytrust-main-css-file', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all');

    // tailwind css output.css file
    wp_register_style('silnytrust-tailwind-css-file', get_template_directory_uri() . '/assets/styles/css/output.css', array(), '4.1.18 ', 'all');

    // custom css file
    wp_register_style('silnytrust-custom-css-file', get_template_directory_uri() . '/assets/styles/css/custom-style.css', array(), wp_get_theme()->get('Version'), 'all');

    // woocommerce css style file
    wp_register_style('silnytrust-woocommerce-css-file', get_template_directory_uri() . '/assets/styles/css/woocommerce-style.css', array(), wp_get_theme()->get('Version'), 'all');

    // owl carousel  min css style file
    wp_register_style('silnytrust-owl-min-css-file', get_template_directory_uri() . '/assets/styles/css/owl.carousel.min.css', array(), '2.3.4', 'all');
    // owl carousel theme  min css style file
    wp_register_style('silnytrust-owl-theme-min-css-file', get_template_directory_uri() . '/assets/styles/css/owl.theme.default.min.css', array(), '2.3.4', 'all');

    // enqueue
    wp_enqueue_style('silnytrust-tailwind-css-file');
    wp_enqueue_style('silnytrust-custom-css-file');
    wp_enqueue_style('silnytrust-woocommerce-css-file');
    wp_enqueue_style('silnytrust-owl-min-css-file');
    wp_enqueue_style('silnytrust-owl-theme-min-css-file');
}
add_action('wp_enqueue_scripts', 'silnytrust_css_file_enqueue');


// js enqueue
function silnytrust_js_file_enqueue()
{

    wp_enqueue_script('jquery');

    // woocommerce js style file
    wp_register_script('silnytrust-custom-js-file', get_template_directory_uri() . '/assets/js/custom.js', array(), wp_get_theme()->get('Version'), true);

    // woocommerce js style file
    wp_register_script('silnytrust-woocommerce-js-file', get_template_directory_uri() . '/assets/js/woocommerce-custom.js', array(), wp_get_theme()->get('Version'), true);

    // owl carousel min js style file
    wp_register_script('silnytrust-owl-min-js-file', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.3.4', true);

    // custom jquery style file
    wp_register_script('silnytrust-custom-jquery-file', get_template_directory_uri() . '/assets/js/custom-jquery.js', array(), wp_get_theme()->get('Version'), true);

    // enqueue
    wp_enqueue_script('silnytrust-custom-js-file');
    wp_enqueue_script('silnytrust-woocommerce-js-file');
    wp_enqueue_script('silnytrust-owl-min-js-file');
    wp_enqueue_script('silnytrust-custom-jquery-file');
}
add_action('wp_enqueue_scripts', 'silnytrust_js_file_enqueue');


// Google Font enqueue
function silnytrust_google_font_enqueue()
{
    $font_url = 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap';

    wp_enqueue_style('silnytrust-google-font', $font_url, array(), null, 'all');
}
add_action('wp_enqueue_scripts', 'silnytrust_google_font_enqueue');


// Font awesome enqueue
function silnytrust_font_awesome_enqueue()
{
    $fontawesome_url = 'https://kit.fontawesome.com/cd231dce85.js';

    wp_enqueue_script('silnytrust-fontawesome', $fontawesome_url, array(), null, true);
}
add_action('wp_enqueue_scripts', 'silnytrust_font_awesome_enqueue');


// // woocommerce css file load
// add_action('wp_enqueue_scripts', function () {

//     if (class_exists('WooCommerce')) {
//         wp_enqueue_style(
//             'woocommerce-general',
//             WC()->plugin_url() . '/assets/css/woocommerce.css'
//         );
//     }
// });

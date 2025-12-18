<?php
// all css, js, font, icon file enqueue

// css file enqueue
function silnytrust_css_file_enqueue()
{
    // main css file (style.css) enqueue
    wp_enqueue_style('silnytrust-main-css', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'), 'all');

    // tailwind css file (output.css) enqueue
    wp_register_style('silnytrust-tailwind-output-css-file', get_template_directory_uri() . '/assets/css/output.css', array(), '4.1.18', 'all');
    wp_enqueue_style('silnytrust-tailwind-output-css-file');

    // theme custom css file (custom-style.css) enqueue
    wp_register_style('silnytrust-custom-style-file', get_template_directory_uri() . '/assets/css/custom-style.css', array(), wp_get_theme()->get('Version'), 'all');
    wp_enqueue_style('silnytrust-custom-style-file');
}
add_action('wp_enqueue_scripts', 'silnytrust_css_file_enqueue');


// js file enqueue
function silnytrust_js_file_enqueue()
{
    // wp default jquery file
    wp_enqueue_script('jquery');

    // custom-javascript file
    wp_register_script('silnytrust-custom-js-file', get_template_directory_uri() . '/assets/js/custom-script.js', array(), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('silnytrust-custom-js-file');
}
add_action('wp_enqueue_scripts', 'silnytrust_js_file_enqueue');


// Google Font Enqueue
function silnytrust_font_icon_enqueue()
{
    // google font
    $google_font_url = 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap';
    wp_enqueue_style('silnytrust-google-font', $google_font_url, array(), null, 'all');

    // Font awesome
    $font_awesome_url = 'https://kit.fontawesome.com/cd231dce85.js';
    wp_enqueue_script('silnytrust-font-awesome', $font_awesome_url, array(), null, true);
}
add_action('wp_enqueue_scripts', 'silnytrust_font_icon_enqueue');

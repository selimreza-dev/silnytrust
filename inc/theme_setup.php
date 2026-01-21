<?php
// Theme setup funciton

function silnytrust_theme_setup()
{
    // title tag support
    add_theme_support('title-tag');

    // custom logo support
    add_theme_support('custom-logo', array(
        'height' => 150,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true
    ));

    // thumbnails support
    add_theme_support('post-thumbnails', array(
        'height' => 250,
        'width' => 500,
        'flex-height' => true,
        'flex-width' => true
    ));

    // woocommerce support
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 300,
        'single_image_width' => 600,
        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 1,
            'max_rows' => 5,
            'default_columns' => 4,
            'min_columns' => 2,
            'max_columns' => 5
        ),
    ));
}
add_action('after_setup_theme', 'silnytrust_theme_setup');


// Menu register
function silnytrust_register_nav_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'silnytrust'),
            'top-menu' => __('Top Menu', 'silnytrust'),
            'bottom-menu' => __('Footer Menu', 'silnytrust')
        )
    );
}
add_action('init', 'silnytrust_register_nav_menus');


// post excerpt word
function silnytrust_post_excerpt_word($length)
{
    return 20;
}
add_filter('excerpt_length', 'silnytrust_post_excerpt_word');

// post excerpt read more button
function silnytrust_post_read_more($more)
{
    return '';
}
add_filter('excerpt_more', 'silnytrust_post_read_more');

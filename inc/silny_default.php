<?php

// Theme support function
function silnytrust_theme_support()
{
    // Custom logo
    add_theme_support('custom-logo', array(
        'width' => 500,
        'height' => 200,
        'flex-width' => true,
        'flex-height' => true
    ));

    // Site title
    add_theme_support('title-tag');

    // Thumbnails support
    add_theme_support('post-thumbnails', array(
        'width' => 900,
        'height' => 450,
        'flex-width' => true,
        'flex-height' => true
    ));

    // menu register
    register_nav_menu(
        'header_top_menu',
        __('Header top Menu', 'silnytrust'),
    );




    register_nav_menu(
        'primary_menu',
        __('Primary Menu', 'silnytrust'),
    );




    register_nav_menu(
        'footer_menu',
        __('Footer Menu', 'silnytrust'),
    );

    // woocommerce support
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 100,
        'single_image_width' => 150,
        'product_grid' => array(
            'default_rows' => 3,
            'min_rows' => 1,
            'max_rows' => 2,
            'default_columns' => 4,
            'min_columns' => 2,
            'max_columns' => 3
        ),
    ));
}
add_action('after_setup_theme', 'silnytrust_theme_support');








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

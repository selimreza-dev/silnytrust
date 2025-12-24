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

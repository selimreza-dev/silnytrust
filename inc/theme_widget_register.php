<?php
// All widget register are here.

function silnytrust_widgets_register()
{
    // main sidebar widgets
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'silnytrust'),
        'id'            => 'main-sidebar',
        'description'   => __('This is Main Sidebar', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer One widgets
    register_sidebar(array(
        'name'          => __('Footer One', 'silnytrust'),
        'id'            => 'footer-one',
        'description'   => __('This is footer one widgets', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer Two widgets
    register_sidebar(array(
        'name'          => __('Footer Two', 'silnytrust'),
        'id'            => 'footer-two',
        'description'   => __('This is footer two widgets', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer Three widgets
    register_sidebar(array(
        'name'          => __('Footer Three', 'silnytrust'),
        'id'            => 'footer-three',
        'description'   => __('This is footer Three widgets', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer Three widgets
    register_sidebar(array(
        'name'          => __('Shop Page Sidebar', 'silnytrust'),
        'id'            => 'shop-sidebar',
        'description'   => __('This is shop page sidebar', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'silnytrust_widgets_register');

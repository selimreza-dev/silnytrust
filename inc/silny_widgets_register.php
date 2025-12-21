<?php
// Widgets Register

function silnytrust_widgets_register()
{
    // Main Sidebar
    register_sidebar(array(
        'name' => __('Main Sidebar', 'silnytrust'),
        'id' => 'main-sidebar',
        'description' => __('This is Main Sidebar', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // Footer Widgets (Footer One)
    register_sidebar(array(
        'name' => __('Footer One', 'silnytrust'),
        'id' => 'footer-one',
        'description' => __('This is Footer One option', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    // Footer Widgets (Footer Two)
    register_sidebar(array(
        'name' => __('Footer Two', 'silnytrust'),
        'id' => 'footer-two',
        'description' => __('This is Footer Two option', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    // Footer Widgets (Footer Three)
    register_sidebar(array(
        'name' => __('Footer Three', 'silnytrust'),
        'id' => 'footer-three',
        'description' => __('This is Footer Two option', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // shop sidebar for woocommerce

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'silnytrust'),
        'id' => 'shop-sidebar',
        'description' => __('This is Woocommerce shop sidebar', 'silnytrust'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'silnytrust_widgets_register');

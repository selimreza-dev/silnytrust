<?php

// Customize Register function
function silnytrust_customize_register($wp_customize)
{
    $wp_customize->add_section('silnytrust_header_top_section', array(
        'title' => __('Header Settings', 'silnytrust'),
        'description' => __('Do you want to change your header you can do it here.', 'silnytrust'),
    ));
    $wp_customize->add_setting('silnytrust_header_email_setting', array(
        'default' => 'contact@silnytrust.com',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_header_email_setting', array(
        'label' => __('Email Address', 'silnytrust'),
        'description' => __('Input your email here.', 'silnytrust'),
        'setting' => 'silnytrust_header_email_setting',
        'section' => 'silnytrust_header_top_section',
        'type' => 'text'
    ));

    // Footer customize register
    $wp_customize->add_section('silnytrust_footer_section', array(
        'title' => __('Footer Settings', 'silnytrust'),
        'description' => __('Do you want to change your footer copyright text you can do it here.', 'silnytrust'),
    ));
    $wp_customize->add_setting('silnytrust_footer_setting', array(
        'default' => '&copy; Copyright ' . date('Y') . ' | ' . get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_footer_setting', array(
        'label' => __('Copyright Text', 'silnytrust'),
        'description' => __('Input your copyright text here.', 'silnytrust'),
        'setting' => 'silnytrust_footer_setting',
        'section' => 'silnytrust_footer_section',
        'type' => 'text'
    ));
}
add_action('customize_register', 'silnytrust_customize_register');

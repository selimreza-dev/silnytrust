<?php
// Customize register

function silnytrust_customize_register($wp_customize)
{
    // Header Hotline number customize
    $wp_customize->add_section('silnytrust_hotline_section', array(
        'title' => __('Header Hotline', 'silnytrust'),
        'description' => __('If you can change your hotline number you can do it here.', 'silnytrust'),
    ));
    $wp_customize->add_setting('silnytrust_hotline_setting', array(
        'default' => '1978 873 518',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_hotline_setting', array(
        'label' => __('Copyright Text', 'silnytrust'),
        'setting' => 'silnytrust_hotline_setting',
        'section' => 'silnytrust_hotline_section',
        'type' => 'text'
    ));


    // footer customize
    $wp_customize->add_section('silnytrust_footer_option', array(
        'title'    => __('Footer Settings', 'silnytrust'),
        'description' => __('If you can change your footer copyright text, you can do it here.', 'silnytrust'),
    ));
    $wp_customize->add_setting('silnytrust_footer_copyright_setting', array(
        'default' => '&copy; Copyright ' . date('Y') . ' | ' . get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_footer_copyright_setting', array(
        'label' => __('Copyright Text', 'silnytrust'),
        'setting' => 'silnytrust_footer_copyright_setting',
        'section' => 'silnytrust_footer_option',
    ));


    // thank you page invoice address and number
    // phone number customize
    $wp_customize->add_section('silnytrust_thank_you_customize', array(
        'title'    => __('Thank You Page Setting', 'silnytrust'),
        'description' => __('If you can change your thank you page invoice phone number you can do it here.', 'silnytrust'),
    ));
    $wp_customize->add_setting('silnytrust_thank_you_phone_setting', array(
        'default' => '01768873518',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_thank_you_phone_setting', array(
        'label' => __('Phone Number', 'silnytrust'),
        'setting' => 'silnytrust_thank_you_phone_setting',
        'section' => 'silnytrust_thank_you_customize',
    ));
    // address
    $wp_customize->add_setting('silnytrust_thank_you_address_setting', array(
        'default' => 'Pabna Sadar',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('silnytrust_thank_you_address_setting', array(
        'label' => __('Address', 'silnytrust'),
        'setting' => 'silnytrust_thank_you_address_setting',
        'section' => 'silnytrust_thank_you_customize',
    ));
}
add_action('customize_register', 'silnytrust_customize_register');

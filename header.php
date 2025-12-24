<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">

<head>
    <meta charset="<?php get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Header Area start -->
    <header id="header" class="header-area light-color-bg">
        <div class="header-container max-w-full px-5 md:max-w-7xl mx-auto flex items-center justify-between">
            <!-- header logo -->
            <div class="header-logo">
                <div class="w-40">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/silnytrust-logo.png'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- header menu -->
            <div class="header-menu">
                <?php
                if (has_nav_menu('header-menu')) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'menu_id'        => 'primary-menu',
                            'fallback_cb'    => false,
                        )
                    );
                }
                ?>
            </div>
            <div class="flex justify-between gap-3 items-center">
                <!-- header product search -->
                <div class="header-product-search">
                    <div>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                            <span class="search-form">
                                <?php get_search_form(); ?>
                            </span>
                        </span>

                    </div>
                </div>
                <!-- header mini cart area -->
                <div class="header-mini-cart">
                    <span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span class="cart-count">
                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                            </span>
                        </span>
                        <div class="mini-cart">

                        </div>
                    </span>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area end-->